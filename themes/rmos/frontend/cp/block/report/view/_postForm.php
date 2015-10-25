<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'cp-form',
    'action'=>$this->createUrl('cp/ajax',array('id'=>md5('ticket'.$this->salt),'params'=>$id)),
    'enableAjaxValidation'=>true,
)); ?>

    <div class="row">
        <div><?php echo $form->labelEx($model,'message'); ?></div>
        <div class="r-right">
            <?php echo $form->textArea($model,'message'); ?>
            <?php echo $form->error($model,'message'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="row buttons">
        <div class="action-buttons">
            <button class="fai-button" onclick="getAjaxForm(jQuery('#cp-form'),'#load-tab',false); return false;">
                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Send');?>
            </button>
        </div>
        <div class="clear"></div>
    </div>

    <?php $this->endWidget(); ?>
</div>

