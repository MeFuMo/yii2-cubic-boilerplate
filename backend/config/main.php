<?php

$params = array_merge(
		require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
	'id' => 'cubic-backend',
	'basePath' => dirname(__DIR__),
	'controllerNamespace' => 'backend\controllers',
	'bootstrap' => ['log'],
	'modules' => [],
	'components' => [
		'request' => [
			'csrfParam' => '_csrf-backend',
			'csrfCookie' => [
				'httpOnly' => true,
				'path' => '/cubic-backend',
			],
		],
		'user' => [
			// commented out per yii2-user config
			// 'identityClass' => 'common\models\User',
			// 'enableAutoLogin' => true,
			'identityCookie' => [
				'name' => '_identity-backend',
				'httpOnly' => true,
				'path' => '/cubic-backend',
			],
		],
		'session' => [
			// this is the name of the session cookie used for login on the backend
			'name' => 'cubic-backend',
			'cookieParams' => [
				'path' => '/cubic-backend',
				'httpOnly' => true,
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
	/*
	  'urlManager' => [
	  'enablePrettyUrl' => true,
	  'showScriptName' => false,
	  'rules' => [
	  ],
	  ],
	 */
	],
	'modules' => [
		'user' => [
			// following line will restrict access to profile, recovery, registration and settings controllers from backend
			'as backend' => 'dektrium\user\filters\BackendFilter',
		],
	],
	'params' => $params,
];
