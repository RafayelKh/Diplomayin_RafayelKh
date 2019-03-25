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
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],
                'common' => [
                    'class' => 'yii\i18n\DbMessageSource',
                ],
            ],
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
            'class' => 'codemix\localeurls\UrlManager',
            'languages' => ['en', 'ru'],
            'enableDefaultLanguageUrlCode' => true,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'about-us' => 'site/about',
                'contact' => 'site/contact',
                'cart/' => 'cart/cart',
                'cart/<id>' => 'cart/cart',
                'cart/remove/<remove_id>' => 'cart/cart',
                'shop' => 'product/products',
                'shop/cat/<cat_id>' => 'product/products',
                'shop/prod/<id>' => 'product/products/product',
                'blog/' => 'blog/blog',
                "blog/<id>" => 'blog/blog/article',
                "blog/<id>/add" => 'blog/blog/add',
                'user' => 'user/user/index',
                'login' => 'site/login',
                'favorites' => '/favorites'
            ],
        ],

    ],
    'params' => $params,
];
