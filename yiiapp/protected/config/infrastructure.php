<?php

switch (ENV) {
	case 'local-motin':
		$GLOBALS['env_config']['components-mail'] = array(
			'transportType' => 'php',
			'logging' => true,
			'dryRun' => true
		);
		define('WGET', '/opt/local/bin/wget');
		break;
	case 'app-sm-hetzner':
		$GLOBALS['env_config']['components-mail'] = array(
			'transportType' => 'php',
			'logging' => true,
			'dryRun' => false
		);
		define('WGET', '/usr/bin/wget');
		break;
	default:
		throw new Exception("ENV environment variable not recognized: '" . ENV . "'");
}
