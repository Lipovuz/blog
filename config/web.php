<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'language' => 'ru-RU',
    'modules'=>[
        'admin'=>[
            'class'=>'app\modules\admin\Module',
            'layout' => 'main',
        ],
        'profile' => [
            'class' => 'app\modules\profile\Module',
        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'app\models\SignupForm',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'K4r79d_0fxYpYlwPxdFLlIwcHpGkGoVL',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'app\components\AuthManager',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],

        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [

                'signup' => 'site/signup',
                'login' => 'site/login',
                'article'=>'profile/article/index',
                'category' => 'admin/category/index',
                'profile' => 'profile/article/profile',
                'article/create' => 'profile/article/create',
                'profile/update' => 'admin/user/update',
                'article/update' => 'profile/article/update',
                'users'=>'/admin/user/index',
                [
                    'pattern' => '<slug>',
                    'route' => 'site/index',
                ],
                [
                    'pattern' => '<slug>/view',
                    'route' => 'admin/category/view',
                ],
                [
                    'pattern' => '<category_slug>/<article_slug>',
                    'route' => 'profile/article/view',
                ],
            ]
        ],
    ],
    'controllerMap' => [
        'name'    => 'full classname',
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['@'],
            'root' => [
                'path' => 'img/global',
                'name' => 'Global'
            ],
        ],
        'fixture' => [
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
