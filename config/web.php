<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'language' => 'zh-TW',
    'id' => 'basic',
    'defaultRoute' => 'index/index',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','gii','cdn'],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableConfirmation' =>false,
            'admins' => ['admin','kent','manager'],
            'enableConfirmation'=>true,
            'layout' => '@app/views/layouts/admin',
            'modelMap' => [
                'User' => [ 'class' =>'app\models\User'],
                'LoginForm' => ['class' => 'app\models\LoginForm'],
             ],
            'controllerMap' => [
                'security' => ['class'=>'app\controllers\admin\SecurityController']
            ],
        ],
        'rbac' => [
            'class' =>'dektrium\rbac\RbacWebModule',
            'layout' => '@app/views/layouts/admin',
        ],
        'redactor' => 'yii\redactor\RedactorModule',
        'categories' => [
            'class' => 'yiimodules\categories\Module',
        ],
        'gii' => 'yii\gii\Module',
    ],
    'components' => [
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => '6LfNLj4UAAAAAOtmKIBad86HtpYfBoZEYLgnLmze',
            'secret' => '6LfNLj4UAAAAAEv5eX4e_M4DklHivT1xjBYVDieU',
        ],
        'cdn' => [
            'class' => 'yiizh\cdn\CDN',
            'assets' => [
                [
                    'class' => 'yii\web\JqueryAsset',
                    'js' => [
                        'http://cdn.bootcss.com/jquery/3.2.1/jquery.min.js'
                    ]
                ],
                [
                    'class' => 'yii\bootstrap\BootstrapAsset',
                    'css' => [
                        'http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css'
                    ]
                ],
            ]
        ],
        'user' => [
            'identityClass' => 'app\models\User',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'HYcuFoDaGvo-P1D6TFIh5AIrbBzCz2wQ',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user',
                    '@dektrium/rbac/widgets/views' => '@app/widgets/rbac/views',
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => False,
            // 'viewPath' => '@common',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 's0261020@gm.ncue.edu.tw',
                'password' => 'eason0926',
                'port' => '465',
                'encryption' =>'ssl',
            ],
            'messageConfig'=>[
                'charset'=>'UTF-8'
            ],
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
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                'web.icasedeal.com/site/contact' => 'site/contact',
                // 'user/security/login'=>'admin/security/login'
            ],
        ],
        'GeneralHelper' => [
            'class' => 'app\components\GeneralHelper',
        ],
        'CategoryHelper' => [
            'class' => 'app\components\CategoryHelper',
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    // 'sourceLanguage' => 'zh-TW',
                    'fileMap' => [
                        'app' => 'app.php',
                        'appuser'=>'user.php',
                        'apprbac'=>'rbac.php',
                        'app/error' => 'error.php',
                        'appWeb' => 'frontend.php'
                    ],
                ],
            ],
        ],
        // 'authManager' => [
        //     'class' => 'yii\rbac\DbManager',
        //     // 'defaultRoles' => ['guest'],
        // ],
        // 'pdf' => [
        //     'class' => Pdf::classname(),
        //     'format' => Pdf::FORMAT_A4,
        //     'orientation' => Pdf::ORIENT_PORTRAIT,
        //     'destination' => Pdf::DEST_BROWSER,
        //     // refer settings section for all configuration options
        // ]

    ],
    'timeZone' => 'Asia/Taipei',
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
