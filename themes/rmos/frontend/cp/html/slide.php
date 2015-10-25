<div class="cp-slide">
    <img src="<?php echo $this->getTemplate('core');?>images/faicore.jpg" alt="faicore"/>
    <div class="hello-msg">
        <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Welcome').', '.Yii::app()->user->username;?>
    </div>
</div>