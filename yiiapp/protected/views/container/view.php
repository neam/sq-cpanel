<?php
$this->breadcrumbs['Containers'] = array('index');
$this->breadcrumbs[] = $model->domain;

if(!$this->menu) 
	$this->menu=array(
			array('label'=>Yii::t('app', 'Update') , 'url'=>array('update', 'id'=>$model->id)),
			array('label'=>Yii::t('app', 'Delete') , 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
			array('label'=>Yii::t('app', 'Manage') , 'url'=>array('admin')),
			array('label'=>Yii::t('app', 'List') , 'url'=>array('index')),
			);
?>

<h2><?php echo Yii::t('app', 'View');?> Container <?php echo $model->domain; ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
'data'=>$model,
	'attributes'=>array(
					'id',
		'domain',
		array(
			'name'=>'user_id',
			'value'=>($model->user !== null)?CHtml::link($model->user->_label, array('/user/view','id'=>$model->user->id)).' '.CHtml::link(Yii::t('app','Update'), array('/user/update','id'=>$model->user->id), array('class'=>'edit')):'n/a',
			'type'=>'html',
		),
		'created',
		array(
			'name'=>'virtualmin_host_id',
			'value'=>($model->virtualminHost !== null)?CHtml::link($model->virtualminHost->_label, array('/virtualminHost/view','id'=>$model->virtualminHost->id)).' '.CHtml::link(Yii::t('app','Update'), array('/virtualminHost/update','id'=>$model->virtualminHost->id), array('class'=>'edit')):'n/a',
			'type'=>'html',
		),
),
	)); ?>


	