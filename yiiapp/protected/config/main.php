<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$config = array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => 'Selfminer Control Panel',
	// preloading 'log' component
	'preload' => array('log'),
	// autoloading model and component classes
	'import' => array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
	),
	'modules' => array(
		'user' => array(
			'debug' => false,
			'userTable' => 'user',
			'translationTable' => 'translation',
		),
		/*
		  'usergroup' => array(
		  'usergroupTable' => 'usergroup',
		  'usergroupMessageTable' => 'user_group_message',
		  ),
		 */
		'membership' => array(
			'membershipTable' => 'membership',
			'paymentTable' => 'payment',
		),
		'profile' => array(
			'privacySettingTable' => 'privacysetting',
			'profileFieldTable' => 'profile_field',
			'profileTable' => 'profile',
			'profileCommentTable' => 'profile_comment',
			'profileVisitTable' => 'profile_visit',
		),
		/*
		  'friendship' => array(
		  'friendshipTable' => 'friendship',
		  ),
		  'profile' => array(
		  'privacySettingTable' => 'privacysetting',
		  'profileFieldTable' => 'profile_field',
		  'profileTable' => 'profile',
		  'profileCommentTable' => 'profile_comment',
		  'profileVisitTable' => 'profile_visit',
		  ),
		 */
		'role' => array(
			'roleTable' => 'role',
			'userRoleTable' => 'user_role',
			'actionTable' => 'action',
			'permissionTable' => 'permission',
		),
		/*
		  'message' => array(
		  'messageTable' => 'message',
		  ),
		 */
		'registration' => array(),
		'avatar' => array(),
		// uncomment the following to enable the Gii tool
		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => YII_GII_PASSWORD,
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters' => array('127.0.0.1', '::1'),
			'generatorPaths' => array(
				'ext.gtc', // Gii Template Collection
				'ext.generator4fixtures',
			),
		),
	),
	// application components
	'components' => array(
		'user' => array(
			'class' => 'application.modules.user.components.YumWebUser',
			// enable cookie-based authentication
			'allowAutoLogin' => true,
			'loginUrl' => array('//user/user/login'),
		),
		// uncomment the following to enable URLs in path-format
		'urlManager' => array(
			'urlFormat' => 'path',
			'rules' => array(
				'/' => 'site/index'
			/*
			  '<controller:\w+>/<id:\d+>'=>'<controller>/view',
			  '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
			  '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			 */
			),
			'showScriptName' => false
		),
		// uncomment the following to use a MySQL database
		'db' => array(
			'connectionString' => 'mysql:host=' . YII_DB_HOST . (defined('YII_DB_PORT') ? ';port=' . YII_DB_HOST : '') . ';dbname=' . YII_DB_NAME,
			'emulatePrepare' => true,
			'username' => YII_DB_USER,
			'password' => YII_DB_PASSWORD,
			'charset' => 'utf8',
		//'schemaCachingDuration'=>3600*24,
		),
		'errorHandler' => array(
			// use 'site/error' action to display errors
			'errorAction' => 'site/error',
		),
		'cache' => array(
			'class' => 'CFileCache',
		),
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning',
				),
			// uncomment the following to show log messages on web pages
			/*
			  array(
			  'class'=>'CWebLogRoute',
			  ),
			 */
			),
		),
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => array(
		// this is used in contact page
		'adminEmail' => 'webmaster@example.com',
	),
);

// Necessary for correct ui/theme rendering
$config['theme'] = 'chromatron';
$config['params']['defaultLayout'] = 'webroot.themes.chromatron.views.layouts.main';
$config['modules']['user']['baseLayout'] = $config['params']['defaultLayout'];
$config['modules']['user']['loginLayout'] = 'webroot.themes.chromatron.views.layouts.login';
$config['params']['chromatron'] = array();
$config['params']['chromatron']['navElement'] = 'application.views.site.elements.nav';
$config['components']['clientScript'] = array(
	'coreScriptPosition' => CClientScript::POS_END,
);
$config['preload'][] = 'bootstrap';
$config['modules']['gii']['generatorPaths'][] = 'bootstrap.gii';
$config['components']['bootstrap'] = array(
	'class' => 'ext.yii-bootstrap.components.Bootstrap',
);

return $config;