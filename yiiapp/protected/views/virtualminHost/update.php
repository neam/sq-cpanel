<?php
$this->breadcrumbs['Virtualmin Hosts'] = array('index');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view','id'=>$model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('app', 'Update');

if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
	array('label'=>Yii::t('app', 'Delete') , 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage') , 'url'=>array('admin')),
);
?>

<h2> <?php echo Yii::t('app', 'Update');?> <?php echo Yii::t('app', 'VirtualminHost');?> #<?php echo $model->id; ?> </h2>
<?php
$this->renderPartial('_form', array(
			'model'=>$model));
?>
