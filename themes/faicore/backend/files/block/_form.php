<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'files-form',
	'enableAjaxValidation'=>true,
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
        <div class="r-right">
		    <?php echo $form->textField($model,'title',array('size'=>'60','maxlength'=>'255')); ?>
            <?php echo $form->error($model,'title'); ?>
        </div>

        <div class="clear"></div>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'description'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'description',array('size'=>'60','maxlength'=>'100')); ?>
            <?php echo $form->error($model,'description'); ?>
        </div>

        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'link'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'link',array('size'=>'60','maxlength'=>'255')); ?>
            <?php echo $form->error($model,'link'); ?>
        </div>

        <div class="clear"></div>
    </div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add').'' : ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Update').'',array('class'=>$model->isNewRecord ? 'button add-btn' : 'button upd-btn')); ?>
        <div class="clear"></div>
	</div>


<?php $this->endWidget(); ?>


</div>