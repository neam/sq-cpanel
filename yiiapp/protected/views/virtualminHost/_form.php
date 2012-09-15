<div class="form">
<p class="note">
<?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
</p>

<?php
$form=$this->beginWidget('CActiveForm', array(
'id'=>'virtualmin-host-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	)); 

echo $form->errorSummary($model);
?>

	<div class="row">
<?php echo $form->labelEx($model,'host'); ?>
<?php echo $form->textField($model,'host',array('size'=>60,'maxlength'=>255)); ?>
<?php echo $form->error($model,'host'); ?>
<div class='hint'><?php if('hint.VirtualminHost.host' != $hint = Yii::t('app', 'host')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'user'); ?>
<?php echo $form->textField($model,'user',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'user'); ?>
<div class='hint'><?php if('hint.VirtualminHost.user' != $hint = Yii::t('app', 'user')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'pass'); ?>
<?php echo $form->passwordField($model,'pass',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'pass'); ?>
<div class='hint'><?php if('hint.VirtualminHost.pass' != $hint = Yii::t('app', 'pass')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'created'); ?>
<?php echo $form->textField($model,'created'); ?>
<?php echo $form->error($model,'created'); ?>
<div class='hint'><?php if('hint.VirtualminHost.created' != $hint = Yii::t('app', 'created')) echo $hint; ?></div>
</div>


<?php
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => array('virtualminhost/admin'))); 
echo CHtml::submitButton(Yii::t('app', 'Save')); 
$this->endWidget(); ?>
</div> <!-- form -->
