<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
            ],
        'authManager' => [
            'class' => 'dektrium\rbac\components\DbManager',
        ],
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableFlashMessages' => false,
            'admins' => ['superadmin']
        ],
        'rbac' => 'dektrium\rbac\RbacWebModule',
    ]
];
