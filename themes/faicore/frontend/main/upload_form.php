<div class="uploading-form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'upload-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'enctype'=>'multipart/form-data',
    ),
)); ?>


	<div class="row">
		    <?php echo $form->fileField($model,'picture', array("accept"=>"image/*")); ?>
            <?php echo $form->error($model,'picture'); ?>
        <div class="clear"></div>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add').'' : ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Update').'',array('class'=>$model->isNewRecord ? 'button add-btn' : 'button upd-btn')); ?>
        <div class="clear"></div>
	</div>

<?php $this->endWidget(); ?>


</div>