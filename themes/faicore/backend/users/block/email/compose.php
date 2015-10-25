<div class="m-header">
    <?php echo $this->pageH1;?>
</div>

<div class="t-h-row">
    <div class="wrapper">
        <ul>
            <li>
                <?php echo CHtml::link(
                '<img src="'.$this->getTemplate('backend').'images/go-back.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Back').'"/><span>'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Back').'</span>',
                array($action, 'id'=>$model->memb_guid),
                array('id'=>'back-btn', 'onClick'=>'getBlock(this);return false;')) ?>
            </li>
        </ul>
    </div>
</div>

<div class="block-cont">
    <div class="form">

        <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'mail-form',
        'action'=>$this->createUrl('sendcompose',array('id'=>$model->memb_guid)),
        'enableAjaxValidation'=>true,
    )); ?>


        <div class="row">
            <?php echo $form->labelEx($mail,'topic'); ?>
            <div class="r-right">
                <?php echo $form->textField($mail,'topic',array('size'=>60,'maxlength'=>255)); ?>
                <?php echo $form->error($mail,'topic'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($mail,'message'); ?>
            <?php echo $form->textArea($mail,'message',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($mail,'message'); ?>
            <div class="clear"></div>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton(''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Send').'',array('class'=>'button add-btn', 'onClick'=>'sendMail()')); ?>
            <div class="clear"></div>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div>
