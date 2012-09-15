<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
)); ?>

        <div class="row">
                <?php echo $form->label($model,'id'); ?>
                <?php echo $form->textField($model,'id'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'host'); ?>
                <?php echo $form->textField($model,'host',array('size'=>60,'maxlength'=>255)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'user'); ?>
                <?php echo $form->textField($model,'user',array('size'=>45,'maxlength'=>45)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'pass'); ?>
                <?php echo $form->passwordField($model,'pass',array('size'=>45,'maxlength'=>45)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'created'); ?>
                <?php echo $form->textField($model,'created'); ?>
        </div>
    
        <div class="row buttons">
                <?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
