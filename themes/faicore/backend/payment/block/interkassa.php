<div class="wrapper">
    <div class="widget">
        <div class="title">
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/common.png" />
            <h6> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Interkassa Settings')?></h6>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'ikID'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'ikID',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('ikID'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter Shop ID')
            )); ?>
                <?php echo $form->error($fconfig,'ikID'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'ikSKey'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'ikSKey',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('ikSKey'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter Secret Key')
            )); ?>
                <?php echo $form->error($fconfig,'ikSKey'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'ikRate'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'ikRate',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('ikRate'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter Rate')
            )); ?>
                <?php echo $form->error($fconfig,'ikRate'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Save') ,array('class'=>'button')); ?>
            <div class="clear"></div>
        </div>
    </div>
</div>
