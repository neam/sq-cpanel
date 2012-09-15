<?php

// auto-loading fix
Yii::setPathOfAlias('VirtualminHost', dirname(__FILE__));
Yii::import('VirtualminHost.*');

class VirtualminHost extends BaseVirtualminHost
{

	// Add your model-specific methods here. This file will not be overriden by gtc except you force it.
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function init()
	{
		return parent::init();
	}

	public function __toString()
	{
		return (string) $this->host;
	}

	public function behaviors()
	{
		return array_merge(parent::behaviors(), array(
		    ));
	}

	public function rules()
	{
		return array_merge(
			/* array('column1, column2', 'rule'), */
			parent::rules()
		);
	}

	public function getRemoteCommand($program, $params = null, $output = null)
	{

		$q = '';
		if (is_array($params))
		{
			foreach ($params as $key => $value)
			{
				$q .= '&' . $key . '=' . $value;
			}
		}

		if (!is_null($output))
		{
			$q .= '&' . $output . '=1';
			if (strpos($program, 'list-') === 0)
			{
				$q .= '&multiline=';
			}
		}

		$cmd = WGET . " -O - --quiet --http-user=" . escapeshellarg($this->user)
		    . " --http-passwd=" . escapeshellarg($this->pass)
		    . " --no-check-certificate "
		    . escapeshellarg("https://" . $this->host . "/virtual-server/remote.cgi?program=$program" . $q)
		//. " 2>&1"
		;

		return $cmd;
	}

}
