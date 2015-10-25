<div class="wrapper">
    <div class="widget">

    <div class="title">
        <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/statistics.png" />
        <h6> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'MMOTOP settings')?></h6>
    </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'mmotopURL'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'mmotopURL',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('mmotopURL'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter mmotop link of your server')
            )); ?>
                <?php echo $form->error($fconfig,'mmotopURL'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'voteURL'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'voteURL',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('voteURL'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter link to file where store all votes')
            )); ?>
                <?php echo $form->error($fconfig,'voteURL'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'voteDefAward'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'voteDefAward',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('voteDefAward'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter number of credits for simple vote')
            )); ?>
                <?php echo $form->error($fconfig,'voteDefAward'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'voteSmsAward'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'voteSmsAward',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('voteSmsAward'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter number of credits for SMS vote')
            )); ?>
                <?php echo $form->error($fconfig,'voteSmsAward'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Save') ,array('class'=>'button')); ?>
            <div class="clear"></div>
        </div>
    </div>
</div>



