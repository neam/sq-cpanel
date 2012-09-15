<?php
$this->breadcrumbs['Virtualmin Hosts'] = array('index');
$this->breadcrumbs[] = $model->id;

if (!$this->menu)
	$this->menu = array(
		array('label' => Yii::t('app', 'Update'), 'url' => array('update', 'id' => $model->id)),
		array('label' => Yii::t('app', 'Delete'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
		array('label' => Yii::t('app', 'Create'), 'url' => array('create')),
		array('label' => Yii::t('app', 'Manage'), 'url' => array('admin')),
		array('label' => Yii::t('app', 'List'), 'url' => array('index')),
	);
?>

<h2><?php echo Yii::t('app', 'View'); ?> VirtualminHost <?php echo $model->id; ?></h2>

<?php
$maskedModel = clone $model;
$maskedModel->pass = str_repeat("*", strlen($maskedModel->pass));

$this->widget('zii.widgets.CDetailView', array(
	'data' => $maskedModel,
	'attributes' => array(
		'id',
		'host',
		'user',
		'pass',
		'created',
	),
));
?>


<h2><?php echo CHtml::link(Yii::t('app', 'Containers'), array('/container/admin')); ?></h2>
<ul>
	<?php
	if (is_array($model->containers))
		foreach ($model->containers as $foreignobj)
		{

			echo '<li>';
			echo CHtml::link($foreignobj->_label, array('/container/view', 'id' => $foreignobj->id));

			echo ' ' . CHtml::link(Yii::t('app', 'Update'), array('/container/update', 'id' => $foreignobj->id), array('class' => 'edit'));
		}
	?></ul><p><?php
	echo CHtml::link(
	    Yii::t('app', 'Create'), array('/container/create', 'Container' => array('virtualmin_host_id' => $model->{$model->tableSchema->primaryKey}))
	);
	?></p>