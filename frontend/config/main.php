<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'product' => [
            'class' => 'frontend\modules\product\Module',
        ],
        'blog' => [
            'class' => 'frontend\modules\blog\Module'
        ],
        'cart' => [
            'class' => 'frontend\modules\cart\Module'
        ],
        'user' => [
            'class' => 'frontend\modules\user\Module',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'about-us' => 'site/about',
                'contact' => 'site/contact',
                'cart/' => 'cart/cart/index',
                'cart/cart/<id:\d+>' => 'cart/cart/add',
                'products/product/cart' => 'product/products/index',
                'blog/' => 'blog/blog/index',
                "blog/<id>" => 'blog/blog/article',
                "blog/<id>/add" => 'blog/add',
                'products/index' => 'product/products/index',
                'products/product/<id:\d+>' => 'product/products/product',
                'user' => 'user/user/index'
            ],
        ],

    ],
    'params' => $params,
];
