<?php

$params = require __DIR__ . '/params.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'jeemce',
    ],
    'modules' => [
        'jeemce' => \jeemce\Module::class, // 1
        'json' => 'app\modules\json\Module',
        'dashboard' => 'app\modules\dashboard\Module',
        'project' => 'app\modules\project\Module',
        'activity' => 'app\modules\activity\Module',
        'subactivity' => 'app\modules\subactivity\Module',
        'ema' => 'app\modules\ema\Module',
        'sda' => 'app\modules\sda\Module',
        'reference'  => 'app\modules\reference\Module',
        'kpi'  => 'app\modules\kpi\Module',
        'pa'  => 'app\modules\pa\Module',
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '7MAy9jXDFGyQMhJJ7zpvDiTIh9mFscfc',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
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
        'urlManager' => [
            // 'enablePrettyUrl' => true,
            // 'showScriptName' => false,
            'rules' => [
                '/<module>/<action>' => '/<module>/default/<action>',
                '/<module>/<controller>/<action>' => '/<module>/<controller>/<action>',
            ],
        ],
    ],
    'params' => $params,
];

$preset = function () {
    return \jeemce\helpers\ArrayHelper::merge(
        (require __DIR__ . '/../vendor/jeemce/yii2/config/any.php'),
        (require __DIR__ . '/../vendor/jeemce/yii2/config/app.php'),
    );
};
$config = \jeemce\helpers\ArrayHelper::merge($preset(), $config);

return $config;
