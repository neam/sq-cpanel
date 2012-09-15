<div class="form">
<p class="note">
<?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
</p>

<?php
$form=$this->beginWidget('CActiveForm', array(
'id'=>'container-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	)); 

echo $form->errorSummary($model);
?>

	<div class="row">
<?php echo $form->labelEx($model,'domain'); ?>
<?php echo $form->textField($model,'domain',array('size'=>60,'maxlength'=>255)); ?>
<?php echo $form->error($model,'domain'); ?>
<div class='hint'><?php if('hint.Container.domain' != $hint = Yii::t('app', 'domain')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'created'); ?>
<?php echo $form->textField($model,'created'); ?>
<?php echo $form->error($model,'created'); ?>
<div class='hint'><?php if('hint.Container.created' != $hint = Yii::t('app', 'created')) echo $hint; ?></div>
</div>

<div class="row">
<label for="virtualminHost"><?php echo Yii::t('app', 'VirtualminHost'); ?></label>
<?php $this->widget(
					'Relation',
					array(
							'model' => $model,
							'relation' => 'virtualminHost',
							'fields' => '_label',
							'allowEmpty' => false,
							'style' => 'dropdownlist',
							'htmlOptions' => array(
								'checkAll' => Yii::t('app', 'Choose all'),
								),)
						); ?><br />
</div>

<div class="row">
<label for="user"><?php echo Yii::t('app', 'User'); ?></label>
<?php $this->widget(
					'Relation',
					array(
							'model' => $model,
							'relation' => 'user',
							'fields' => '_label',
							'allowEmpty' => false,
							'style' => 'dropdownlist',
							'htmlOptions' => array(
								'checkAll' => Yii::t('app', 'Choose all'),
								),)
						); ?><br />
</div>


<?php
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => array('container/admin'))); 
echo CHtml::submitButton(Yii::t('app', 'Save')); 
$this->endWidget(); ?>
</div> <!-- form -->
