<div id="ticket-post-form">
<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'cp-form',
    'enableAjaxValidation'=>true,
)); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'topic'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'topic',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'topic'); ?>
        </div>

        <div class="clear"></div>
    </div>

    <div class="row">
        <div><?php echo $form->labelEx($model,'description'); ?></div>
        <div class="r-right">
            <?php echo $form->textArea($model,'description'); ?>
            <?php echo $form->error($model,'description'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="row">
        <?php
        echo $form->dropDownList($model,'priority',
            array(0=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Low').'', 1=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Normal').''
            , 2=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'High').'', 3=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Urgent').''),
            array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select the priority').')', 'class'=>'cat-select')
        );?>
        <?php echo $form->error($model,'priority'); ?>
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
</div>

