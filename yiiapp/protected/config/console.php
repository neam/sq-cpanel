<?php

$envbootstrap = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'envbootstrap.php';

if (!is_readable($envbootstrap))
{
	echo "Main envbootstrap file not available.";
	die(2);
}
require_once($envbootstrap);

//  Merge-approach from http://www.yiiframework.com/forum/index.php?/topic/23899-merging-mainphp-and-commandphp-config-files/
$mainConfigArray = require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'main.php';

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => 'Selfminer Cpanel Console Application',
	'import' => array_merge($mainConfigArray['import'], array(
		'application.commands.components.*',
	    )
	),
	// preloading 'log' component
	'preload' => array('log'),
	// application components
	'components' => array(
		'db' => $mainConfigArray['components']['db'],
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning',
				),
			),
		),
		'fixture' => array(
			'class' => 'system.test.CDbFixtureManager',
		),
	),
	'commandMap' => array(
		'fixture' => array(
			'class' => 'application.extensions.fixtureHelper.FixtureHelperCommand',
		),
	),
);
