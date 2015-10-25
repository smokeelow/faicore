<?php if(Yii::app()->user->isGuest):?>
    <div class="login">
      <?php echo CHtml::form($this->createUrl('/cp/login'),'post',array('id'=>'action-form'));?>
            <div class="l-f">
                <input id="usr-name" name="Account[memb___id]" type="text" value="" placeholder="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Login');?>"/>
                <input id="password" name="Account[memb__pwd]" type="password" value="" placeholder="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Password');?>"/>
                <button class="l-b" name="Submit"></button>
            </div>

            <div id="recover">
                <a id="recovery-password" class="f-pa" href="<?php echo $this->createUrl('cp/recovery');?>">
                    <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Recover password');?>
                </a>
            </div>
      <?php echo CHtml::endForm();?>
    </div>
<?php else:?>
    <div id="auth-user" class="login">
        <div class="user-login">
            <?php echo Yii::app()->user->username;?>
        </div>

        <a id="go-to-cp" href="<?php echo $this->createUrl('cp/index');?>">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Go to the Control Panel');?>
        </a>

        <a id="user-logout" href="<?php echo $this->createUrl('cp/logout');?>">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Logout');?>
        </a>
    </div>
<?php endif;?>

