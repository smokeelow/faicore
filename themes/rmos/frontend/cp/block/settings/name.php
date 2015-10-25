<div id="name" class="acc-set-section n-a">
    <div class="sec-title">
        <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Change nickname');?>
    </div>

    <div class="row">
        <div class="l-val">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Current nickname').':';?>
        </div>
        <div class="r-right empty">
            <?php echo $this->getValue($model->memb_name);?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="row">
           <div class="l-val">
               <?php echo $form->labelEx($model,'new_name'); ?>
           </div>
            <div class="r-right">
                <?php echo $form->textField($model,'new_name',array('maxlength'=>10)); ?>
                <?php echo $form->error($model,'new_name'); ?>
            </div>
            <div class="clear"></div>
    </div>
</div>