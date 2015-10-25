<div id="faicore-reg-form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'cp-form',
    'enableAjaxValidation'=>true,
)); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'new_pwd'); ?>

        <div class="r-right">
            <input name="Security[new_pwd]" id="Security[new_pwd]" value="" type="text" placeholder="<?Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter new password');?>"/>
            <?php echo $form->error($model,'new_pwd'); ?>
        </div>

        <div class="clear"></div>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Save'),array('class'=>$model->isNewRecord ? 'button add-btn' : 'button upd-btn')); ?>
        <div class="clear"></div>
    </div>

<?php $this->endWidget(); ?>
</div>

<script>
    jQuery(function(){
        getScrollBar(jQuery('#up-win-cont'));
    });
</script>