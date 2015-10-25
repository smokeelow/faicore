<div class="wrapper">
    <div class="widget">

    <div class="title">
        <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/forum_16.png" />
        <h6> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'IPB settings')?></h6>
    </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'ipbServer'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'ipbServer',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('ipbServer'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter IP Address of MySql server where IPB was install')
            )); ?>
                <?php echo $form->error($fconfig,'ipbServer'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'ipbDB'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'ipbDB',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('ipbDB'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter database name')
            )); ?>
                <?php echo $form->error($fconfig,'ipbDB'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'ipbUser'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'ipbUser',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('ipbUser'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter username of MySql')
            )); ?>
                <?php echo $form->error($fconfig,'ipbUser'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'ipbPass'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'ipbPass',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('ipbPass'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter password of MySql user')
            )); ?>
                <?php echo $form->error($fconfig,'ipbPass'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'ipbTNumber'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'ipbTNumber',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('ipbTNumber'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter number of topics')
            )); ?>
                <?php echo $form->error($fconfig,'ipbTNumber'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'ipbCache'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'ipbCache',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('ipbCache'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter cache duration (in seconds)')
            )); ?>
                <?php echo $form->error($fconfig,'ipbDB'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Save') ,array('class'=>'button')); ?>
            <div class="clear"></div>
        </div>
    </div>
</div>



