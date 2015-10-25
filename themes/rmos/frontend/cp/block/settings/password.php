<div id="email" class="acc-set-section n-a">
    <div class="sec-title">
        <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Change password');?>
    </div>

    <div class="row">
        <div class="l-val">
            <?php echo $form->labelEx($model,'old_password'); ?>
        </div>
        <div class="r-right">
            <?php echo $form->passwordField($model,'old_password',array('maxlength'=>50)); ?>
            <?php echo $form->error($model,'old_password'); ?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="row">
        <div class="l-val">
            <?php echo $form->labelEx($model,'new_password'); ?>
        </div>
        <div class="r-right">
            <?php echo $form->passwordField($model,'new_password',array('maxlength'=>50)); ?>
            <?php echo $form->error($model,'new_password'); ?>
        </div>
        <div class="clear"></div>
    </div>
</div>