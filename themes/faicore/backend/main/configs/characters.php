<div class="wrapper">
    <div class="widget">
        <div class="title">
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/u-g.png" />
            <h6> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Character settings')?></h6>
        </div>

            <div class="row">
                 <?php echo $form->labelEx($fconfig,'top_chars'); ?>

                <div class="r-right">
                    <?php echo $form->textField($fconfig,'top_chars',array(
                        'size'=>60,'maxlength'=>255,
                        'value'=>$this->getFConfig('top_chars'),
                        'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Number of characters')
                    )); ?>
                    <?php echo $form->error($fconfig,'top_chars'); ?>
                </div>

                <div class="clear"></div>
            </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Save') ,array('class'=>'button')); ?>
            <div class="clear"></div>
        </div>
    </div>
</div>
