<?php

namespace app\modules\profile\controllers;

use app\rbac\Rbac;
use Yii;
use app\models\Article;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
use yii\web\UploadedFile;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    public $layout;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (\Yii::$app->user->can(Rbac::PERMISSION_ADMIN_PANEL)) {
            $this->layout = '@app/modules/admin/views/layouts/main.php';
            return $this->layout;
        }
        $this->layout = '@app/views/layouts/main.php';

        return $this->layout;
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Article::find()->orderBy('status'),
            'pagination' => [
                'pageSize' => 20,
            ]
        ]);

        return $this->render('index', compact('dataProvider'));
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->getMetaTag($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionProfile()
    {
        $user_id=Yii::$app->user->id;
        $dataProvider = new ActiveDataProvider([
            'query' => Article::find()->where(['user_id'=>$user_id]),]);
        $model =  User::find()->where(['id'=>$user_id])->one();

        return $this->render('profile', compact('model','dataProvider'));
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();
        $model->user_id = Yii::$app->user->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->preview = UploadedFile::getInstance($model, 'preview');
            if(!empty($model->preview))
            {
                $model->preview->saveAs('img/preview_'.$model->id.'.'.$model->preview->extension);
                $model->preview = 'preview_'.$model->id.'.'.$model->preview->extension;
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $this->getMetaTag($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->preview = UploadedFile::getInstance($model, 'preview');
            if(!empty($model->preview))
            {
                $model->preview->saveAs('img/preview_'.$model->id.'.'.$model->preview->extension);
                $model->preview = 'preview_'.$model->id.'.'.$model->preview->extension;

                $model->save();
            }
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionImageDelete($id)
    {
        $model = $this->findModel($id);
        unlink('img/'.$model->preview);
        $model->preview = null;
        $model->save() ;
        return $this->redirect(['update','id'=>$id]);
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public  function getMetaTag($id){
        $model = $this->findModel($id);
        \Yii::$app->view->registerMetaTag([
            'name' => 'title',
            'content' => $model->meta_title,
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $model->meta_description,
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $model->meta_keywords,
        ]);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
