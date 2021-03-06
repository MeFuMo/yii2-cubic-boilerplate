<?php

$params = array_merge(
		require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
	'id' => 'app-frontend',
	'basePath' => dirname(__DIR__),
	'bootstrap' => ['log'],
	'controllerNamespace' => 'frontend\controllers',
	'components' => [
		'request' => [
			'csrfParam' => '_csrf-frontend',
		],
		'user' => [
			// commented out per yii2-user config
			// 'identityClass' => 'common\models\User',
			// 'enableAutoLogin' => true,
			'identityCookie' => [
				'name' => '_identity-frontend',
				'path' => '/',
				'httpOnly' => true
			],
		],
		'session' => [
			// this is the name of the session cookie used for login on the frontend
			'name' => 'cubic-frontend',
			'cookieParams' => [
				'httpOnly' => true,
				'path' => '/',
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
		'errorHandler' => [
			'errorAction' => 'site/error',
		],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'rules' => [
				'<controller:\w+>/<id:\d+>' => '<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
			],
		],
	],
	'modules' => [
		'user' => [
			// following line will restrict access to admin controller from frontend application
			'as frontend' => 'dektrium\user\filters\FrontendFilter',
		],
	],
	'params' => $params,
];
