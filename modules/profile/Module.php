<?php

namespace app\modules\profile;

use yii\filters\AccessControl;
use app\modules\admin\rbac\Rbac as AdminRbac;

/**
 * profile module definition class
 */
class Module extends \yii\base\Module
{
    public function behaviors()
    {
        if (\Yii::$app->user->can(AdminRbac::PERMISSION_ADMIN_PANEL)){
            $this->layout = '@app/modules/admin/views/layouts/main.php';
        }
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['user'],
                    ],
                    [
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],

            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\profile\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
