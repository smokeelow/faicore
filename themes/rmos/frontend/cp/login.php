<div id="faicore-reg-form">
    <?php
    $flashMessages = Yii::app()->user->getFlashes();
    if ($flashMessages) {
        echo '<ul class="core-messages">';
        foreach($flashMessages as $key => $message) {
            echo '<li><div class="flash-' . $key . '">
                        <p>' . $message . "</p>
                    </div></li>\n";
        }
        echo '</ul>';
    }
    ?>

    <div class="form">

        <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'register-form',
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
            <?php echo $form->labelEx($model,'memb__pwd'); ?>
            <div class="r-right">
                <?php echo $form->passwordField($model,'memb__pwd',array('size'=>60,'maxlength'=>100)); ?>
                <?php echo $form->error($model,'memb__pwd'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Sign in'),array('class'=>$model->isNewRecord ? 'button add-btn' : 'button upd-btn')); ?>

            <a id="recovery-pass" href="<?php echo $this->createUrl('cp/recovery');?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Recover password');?>">
                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Recover password');?>
            </a>
            <div class="clear"></div>
        </div>


        <?php $this->endWidget(); ?>
    </div>
</div>

<?php if(Yii::app()->session->get('registered') == 1): ?>
    <script>
        jQuery.ajax({
            type: 'POST',
            url:  '<?php echo $this->createUrl('registration/sendmail');?>',
            cache: false,
            data: '&send=send'+'&<?php echo Yii::app()->request->csrfTokenName.'='.Yii::app()->request->csrfToken;?>'
        });
    </script>
<?php endif;?>
