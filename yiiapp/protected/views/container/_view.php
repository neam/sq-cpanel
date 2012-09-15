<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('domain')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->domain), array('view', 'domain'=>$data->domain)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('domain')); ?>:</b>
	<?php echo CHtml::encode($data->domain); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('virtualmin_host_id')); ?>:</b>
	<?php echo CHtml::encode($data->virtualmin_host_id); ?>
	<br />


</div>
