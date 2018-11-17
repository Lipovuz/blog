<?php

namespace app\modules\admin;

use app\modules\admin\rbac\Rbac as AdminRbac;
use yii\filters\AccessControl;


/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [AdminRbac::PERMISSION_ADMIN_PANEL],
                    ],

                    [
                        'actions' => ['update'],
                        'allow' => true,
                        'roles' => ['user'],
                    ],
                ],

            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
