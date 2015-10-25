<div id="faicore-reg-form">
    <div class="form">
        <?php echo CHtml::form($this->createUrl('cp/recovery'),'post');?>

            <div class="row">

                <div class="r-right">
                    <input name="recovery" type="text" value="" placeholder="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'E-Mail');?>"/>
                </div>

                <div class="clear"></div>
            </div>

            <div class="row buttons">
                <?php echo CHtml::submitButton(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Send'),array('class'=>'button add-btn')); ?>
                <div class="clear"></div>
            </div>
        <?php echo CHtml::endForm();?>
    </div>
</div>