<?php

/**
 * This is the model base class for the table "container".
 *
 * Columns in table "container" available as properties of the model:
 * @property integer $id
 * @property string $domain
 * @property string $user_id
 * @property string $created
 * @property integer $virtualmin_host_id
 *
 * Relations of table "container" available as properties of the model:
 * @property VirtualminHost $virtualminHost
 * @property User $user
 */
abstract class BaseContainer extends CActiveRecord
{

	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'container';
	}

	public function rules()
	{
		return array(
			array('domain', 'unique'),
			array('domain', 'identificationColumnValidator'),
			array('user_id, virtualmin_host_id', 'required'),
			array('domain, created', 'default', 'setOnEmpty' => true, 'value' => null),
			array('virtualmin_host_id', 'numerical', 'integerOnly' => true),
			array('domain', 'length', 'max' => 255),
			array('user_id', 'length', 'max' => 10),
			array('created', 'safe'),
			array('id, domain, user_id, created, virtualmin_host_id', 'safe', 'on' => 'search'),
		);
	}

	public function relations()
	{
		return array(
			'virtualminHost' => array(self::BELONGS_TO, 'VirtualminHost', 'virtualmin_host_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app', 'ID'),
			'domain' => Yii::t('app', 'Domain'),
			'user_id' => Yii::t('app', 'User'),
			'created' => Yii::t('app', 'Created'),
			'virtualmin_host_id' => Yii::t('app', 'Virtualmin Host'),
		);
	}

	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('t.id', $this->id);
		$criteria->compare('t.domain', $this->domain, true);
		$criteria->compare('t.user_id', $this->user_id);
		$criteria->compare('t.created', $this->created, true);
		$criteria->compare('t.virtualmin_host_id', $this->virtualmin_host_id);

		return new CActiveDataProvider(get_class($this), array(
			    'criteria' => $criteria,
		    ));
	}

	public function get_label()
	{
		return '#' . $this->id;
	}

}
