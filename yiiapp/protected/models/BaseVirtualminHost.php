<?php

/**
 * This is the model base class for the table "virtualmin_host".
 *
 * Columns in table "virtualmin_host" available as properties of the model:
 * @property integer $id
 * @property string $host
 * @property string $user
 * @property string $pass
 * @property string $created
 *
 * Relations of table "virtualmin_host" available as properties of the model:
 * @property Container[] $containers
 */
abstract class BaseVirtualminHost extends CActiveRecord
{

	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'virtualmin_host';
	}

	public function rules()
	{
		return array(
			array('host', 'unique'),
			array('host', 'identificationColumnValidator'),
			array('host, user, pass, created', 'default', 'setOnEmpty' => true, 'value' => null),
			array('host', 'length', 'max' => 255),
			array('user, pass', 'length', 'max' => 45),
			array('created', 'safe'),
			array('id, host, user, pass, created', 'safe', 'on' => 'search'),
		);
	}

	public function relations()
	{
		return array(
			'containers' => array(self::HAS_MANY, 'Container', 'virtualmin_host_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app', 'ID'),
			'host' => Yii::t('app', 'Host'),
			'user' => Yii::t('app', 'User'),
			'pass' => Yii::t('app', 'Pass'),
			'created' => Yii::t('app', 'Created'),
		);
	}

	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('t.id', $this->id);
		$criteria->compare('t.host', $this->host, true);
		$criteria->compare('t.user', $this->user, true);
		$criteria->compare('t.pass', $this->pass, true);
		$criteria->compare('t.created', $this->created, true);

		return new CActiveDataProvider(get_class($this), array(
			    'criteria' => $criteria,
		    ));
	}

	public function get_label()
	{
		return '#' . $this->id;
	}

}
