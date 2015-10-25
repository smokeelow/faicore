<div id="email" class="acc-set-section n-a">
    <div class="sec-title">
        <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Your e-mail');?>
    </div>

    <div class="row">
        <div class="l-val">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Current address').':';?>
        </div>
        <div class="r-right empty">
            <?php echo $this->hideEmail($model->mail_addr);?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="row">
        <div class="l-val">
            <?php echo $form->labelEx($model,'new_email'); ?>
        </div>
        <div class="r-right">
            <?php echo $form->textField($model,'new_email',array('maxlength'=>50)); ?>
            <?php echo $form->error($model,'new_email'); ?>
        </div>
        <div class="clear"></div>
    </div>
</div>