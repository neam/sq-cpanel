<?php
$this->breadcrumbs['Virtualmin Hosts'] = array('index');
$this->breadcrumbs[] = Yii::t('app', 'Create');

if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
	/*array('label'=>Yii::t('app', 'List'), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Manage'), 'url'=>array('admin')),*/
);
?>

<h2> Create VirtualminHost </h2>
<?php
$this->renderPartial('_form', array(
			'model' => $model,
			'buttons' => 'create'));

?>

