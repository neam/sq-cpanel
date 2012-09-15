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
                <?php echo $form->label($model,'domain'); ?>
                <?php echo $form->textField($model,'domain',array('size'=>60,'maxlength'=>255)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'user_id'); ?>
                <?php echo $form->dropDownList($model,'user_id',CHtml::listData(User::model()->findAll(), 'id', '_label'),array('prompt'=>Yii::t('app', 'All'))); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'created'); ?>
                <?php echo $form->textField($model,'created'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'virtualmin_host_id'); ?>
                <?php echo $form->dropDownList($model,'virtualmin_host_id',CHtml::listData(VirtualminHost::model()->findAll(), 'id', '_label'),array('prompt'=>Yii::t('app', 'All'))); ?>
        </div>
    
        <div class="row buttons">
                <?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
