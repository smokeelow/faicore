<div class="l-bb">
    <div id="login-side">
        <div class="ls-title">
            <h2>
                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Sign in');?>
            </h2>
        </div>
        <?php echo $this->renderPartial('login',array('model'=>$model));?>
    </div>

        <div class="l-or">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'or');?>
        </div>

    <div id="reg-side">
        <div class="ls-title">
            <h2>
                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'New user');?>
            </h2>
        </div>
        <?php echo $this->renderPartial('html/regSide');?>
    </div>
    <div class="clear"></div>
</div>

    <div class="other-links">

    </div>