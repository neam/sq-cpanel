<?php
//xdebug_start_trace("/tmp/trace.log");
//
// change the following paths if necessary
$config = dirname(__FILE__) . '/protected/config/main.php';
$envbootstrap = dirname(__FILE__) . '/protected/config/envbootstrap.php';
$yii = dirname(__FILE__) . '/../yii/framework/yii.php';

//define('APP_PATH', dirname(__FILE__));

if (!is_readable($envbootstrap))
{
	echo "Main envbootstrap file not available.";
	die(2);
}

require_once($envbootstrap);

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', DEV && !empty($_GET['yii_debug']));
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

function yiidie($vars = "")
{
	Yii::log("Yii-friendly debug die." . xdebug_get_tracefile_name() . " " . print_r($vars, true), "flow", "die");
	//xdebug_stop_trace();
	Yii::app()->end();
}

require_once($yii);

Yii::createWebApplication($config)->run();

/*
require_once(APP_PATH.'/protected/components/AppWebApplication.php');
$app = new AppWebApplication($config);
$app->run();
*/

//xdebug_stop_trace();