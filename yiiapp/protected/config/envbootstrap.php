<?php

// Detect the current environment
//var_dump($_SERVER);die();

if (php_sapi_name() == 'cli')
{
	$revealing_path = realpath($_SERVER['PWD']);
} else
{
	$revealing_path = realpath($_SERVER['DOCUMENT_ROOT']);
}
if (empty($revealing_path))
	throw new Exception('No revealing path available');

define('REVEALING_PATH', $revealing_path);

// Debug
//var_dump(compact("revealing_path"));

if (strpos($revealing_path, '/Applications/XAMPP_1.7.3/xamppfiles/htdocs') !== false || strpos($revealing_path, '/Applications/XAMPP/xamppfiles/htdocs') !== false || strpos($revealing_path, '/Users/motin/Dev/Projects/sq/sq-app/yiiapp/protected') !== false || strpos($revealing_path, '/Users/motin/Dev/Projects/openlibraries_php/drupal/sites/all/modules/internal/oppnabibliotek') !== false || strpos($revealing_path, '/Users/motin/Dev/Projects/sq/sq-app/yiiapp/protected') !== false || strpos($revealing_path, '/Users/motin/Dev/Projects/ssb/ssb_mobile/_drupal/_internal/modules/ssb_emedia') !== false)
{
	// local set-up
	define('DEV_UNIX_USER', 'motin');
	define('ENV', 'local-motin');
	define('DEV', empty($_GET['nodev']) ? true : false);
	define('DEBUG_REDIRECTS', true);
	define('DEBUG_LOGS', true);
	define('CONTACT_EMAIL', 'sq-app-local-dev-noreply@neam.se');
	//define('YII_DEBUG', true);
	define('BASH_COMPLETION_PATH', '/opt/local/etc/bash_completion.d');

} elseif (strpos($revealing_path, '/home/sqdropbox/Dropbox/sq/sq-cpanel/yiiapp') !== false)
{
	define('DEV_UNIX_USER', 'app');
	define('ENV', 'app-sm-hetzner');
	define('DEV', true);
	define('DEBUG_REDIRECTS', true);
	define('DEBUG_LOGS', true);
	define('CONTACT_EMAIL', 'support@selfminer.com');
	//define('CONTACT_EMAIL', 'sq-cpanel-dev-noreply@neam.se');
	//define('YII_DEBUG', true);

} else
{
	throw new Exception('Currently unconfigured environment. Revealing path: ' . $revealing_path);
}

require('secrets.php');
require('infrastructure.php');