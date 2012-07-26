<?php

switch (ENV) {
	case 'local-motin':
		$GLOBALS['env_config']['components-mail'] = array(
			'transportType' => 'php',
			'logging' => true,
			'dryRun' => true
		);
		break;
	case 'app-sm-hetzner':
		$GLOBALS['env_config']['components-mail'] = array(
			'transportType' => 'php',
			'logging' => true,
			'dryRun' => false
		);
		break;
	default:
		throw new Exception("ENV environment variable not recognized: '" . ENV . "'");
}
