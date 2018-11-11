<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\base\InvalidParamException;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use app\models\Article;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionSignup(){
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())){
            if ($user = $model->signup()){
                if (Yii::$app->getUser()->login($user)){
                    return $this->goHome();
                }
            }
        }
        return $this->render('signup',compact('model'));
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $id = Yii::$app->request->get('category', null);

        $articles = Article::find()
            ->where(['status'=>User::STATUS_ACTIVE]);
        if (null !== $id) {
            $articles->andWhere(['category_id' => $id])->asArray();
        }

        $articles = $articles
            ->asArray();

        $pages = new Pagination(['totalCount' => $articles->count(),'pageSize' => 50]);
        $articles = $articles->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index',
            [
                'articles' => $articles,
                'pages' => $pages,
            ]
        );
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Перевірте свою електронну пошту для подальших інструкцій.');
                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'На жаль, ми не можемо скинути пароль для наданої почти.');
            }
        }
        return $this->render('passwordResetRequestForm',compact('model'));
    }

    public function actionResetPasswordForm($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');
            return $this->goHome();
        }
        return $this->render('resetPasswordForm',compact('model'));
      }

}
