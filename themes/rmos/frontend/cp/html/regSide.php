<div class="lp-reg">
    <div class="lp-reg-top">
        <div class="lp-reg-bot">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Get access to the game and the control account, and many other functions of the site, just go super fast registration.');?>
            <div class="reg-arrow">&nbsp;</div>
            <a class="fai-button reg-btn" href="<?php echo $this->createUrl('registration/index');?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Register an account');?>">
                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Register');?>
            </a>
        </div>
    </div>
</div>