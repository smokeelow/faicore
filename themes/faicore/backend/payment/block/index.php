<div class="wrapper">
<div class="widget">
    <div class="title">
        <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/common.png" />
        <h6> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'General settings')?></h6>
    </div>

    <div class="row">
        <?php echo $form->labelEx($fconfig,'versionBit'); ?>

        <div class="r-right">
            <?php
            echo $form->dropDownList($fconfig,'versionBit',
                array(64=>'64', 32=>'32',16=>'16'),
                array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select value').')',
                    'options'=>array(''.$this->getFConfig('versionBit').''=>array('selected'=>'selected')),
                    'class'=>'cat-select')
            );?>
            <?php echo $form->error($fconfig,'versionBit'); ?>
        </div>

        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($fconfig,'email'); ?>

        <div class="r-right">
            <?php echo $form->textField($fconfig,'email',array(
            'size'=>60,'maxlength'=>255,
            'value'=>$this->getFConfig('email'),
            'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter project e-mail')
        )); ?>
            <?php echo $form->error($fconfig,'email'); ?>
        </div>

        <div class="clear"></div>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Save') ,array('class'=>'button')); ?>
        <div class="clear"></div>
    </div>
</div>
</div>
