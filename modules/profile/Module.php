<?php

namespace app\modules\profile;

use yii\filters\AccessControl;

/**
 * profile module definition class
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
    }
}
