<div id="faicore-reg-form">
    <div class="form">

        <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'register-form',
        'action'=>$this->createUrl('registration/index'),
        'enableAjaxValidation'=>true,
        )); ?>

        <div class="row">
            <?php echo $form->labelEx($model,'memb___id'); ?>
            <div class="r-right">
                <?php echo $form->textField($model,'memb___id',array('size'=>60,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'memb___id'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'memb_name'); ?>
            <div class="r-right">
                <?php echo $form->textField($model,'memb_name',array('size'=>60,'maxlength'=>100)); ?>
                <?php echo $form->error($model,'memb_name'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'memb__pwd'); ?>
            <div class="r-right">
                <?php echo $form->passwordField($model,'memb__pwd',array('size'=>60,'maxlength'=>100)); ?>
                <?php echo $form->error($model,'memb__pwd'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'mail_addr'); ?>
            <div class="r-right">
                <?php echo $form->textField($model,'mail_addr',array('size'=>60,'maxlength'=>100)); ?>
                <?php echo $form->error($model,'mail_addr'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Register'),array('class'=>$model->isNewRecord ? 'button add-btn' : 'button upd-btn')); ?>
            <div class="clear"></div>
        </div>



        <?php $this->endWidget(); ?>

    </div>
</div>

<script>
    jQuery(function(){
        jQuery('#char').bind("change",function (){
            jQuery.ajax({
                type: 'POST',
                url:  'update',
                cache: false,
                data: '&char=' + jQuery('#char').val(),
                success: function(){
                    jQuery("#faicore-cp").load('<?php echo Yii::app()->request->requestUri;?> #faicore-cp');
                }
            });
        });
    });
</script>
