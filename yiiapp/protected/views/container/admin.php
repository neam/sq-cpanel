<?php
$this->breadcrumbs['Containers'] = array('index');
$this->breadcrumbs[] = Yii::t('app', 'Admin');

if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
array('label'=>Yii::t('app', 'List') , 'url'=>array('index')),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('container-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h2> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'Containers'); ?> </h2>


<ul><li>BelongsTo <a href="/Projects/sq/sq-cpanel/yiiapp/virtualminHost/admin">VirtualminHost</a> </li><li>BelongsTo <a href="/Projects/sq/sq-cpanel/yiiapp/user/admin">User</a> </li></ul>

<?php echo CHtml::link(Yii::t('app', 'Advanced Search'),'#',array('class'=>'search-button')); ?><div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>
<?php
$locale = CLocale::getInstance(Yii::app()->language);

 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'container-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(

	
		'id',
		'domain',
		array(
					'name'=>'user_id',
					'value'=>'CHtml::value($data,\'user._label\')',
							'filter'=>CHtml::listData(User::model()->findAll(), 'id', '_label'),
							),
		'created',
		array(
					'name'=>'virtualmin_host_id',
					'value'=>'CHtml::value($data,\'virtualminHost._label\')',
							'filter'=>CHtml::listData(VirtualminHost::model()->findAll(), 'id', '_label'),
							),
		array(
			'class'=>'CButtonColumn',
			'viewButtonUrl' => "Yii::app()->controller->createUrl('view', array('id' => \$data->id))",
			'updateButtonUrl' => "Yii::app()->controller->createUrl('update', array('id' => \$data->id))",
			'deleteButtonUrl' => "Yii::app()->controller->createUrl('delete', array('id' => \$data->id))",

		),
	),
)); ?>


<?php echo CHtml::link('Create new Container', array('create')); ?>