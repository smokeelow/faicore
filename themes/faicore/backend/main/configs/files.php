<div class="wrapper">
    <div class="widget">
        <div class="title">
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/ark2.png" />
            <h6> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Downloadable files')?></h6>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'clientDown'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'clientDown',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('clientDown'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter link of game client')
            )); ?>
                <?php echo $form->error($fconfig,'clientDown'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'clientDown_1'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'clientDown_1',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('clientDown_1'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter link of game client')
            )); ?>
                <?php echo $form->error($fconfig,'clientDown_1'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'clientDown_2'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'clientDown_2',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('clientDown_2'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter link of game client')
            )); ?>
                <?php echo $form->error($fconfig,'clientDown_2'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'clientDown_3'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'clientDown_3',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('clientDown_3'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter link of game client')
            )); ?>
                <?php echo $form->error($fconfig,'clientDown_3'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'clientDown_4'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'clientDown_4',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('clientDown_4'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter link of game client')
            )); ?>
                <?php echo $form->error($fconfig,'clientDown_4'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'clientDown_5'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'clientDown_5',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('clientDown_5'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter link of game client')
            )); ?>
                <?php echo $form->error($fconfig,'clientDown_5'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'patchDown'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'patchDown',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('patchDown'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter link of patch')
            )); ?>
                <?php echo $form->error($fconfig,'patchDown'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'launcherDown'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'launcherDown',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('launcherDown'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter link of launcher')
            )); ?>
                <?php echo $form->error($fconfig,'launcherDown'); ?>
            </div>

            <div class="clear"></div>
        </div>
        <div class="row buttons">
            <?php echo CHtml::submitButton(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Save') ,array('class'=>'button')); ?>
            <div class="clear"></div>
        </div>
    </div>
</div>


