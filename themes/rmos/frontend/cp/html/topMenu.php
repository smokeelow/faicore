<div id="server-name">
    <a href="<?php echo $this->createUrl('main/index');?>" target="_blank">
        <img src="<?php echo $this->getTemplate('core');?>images/mu-logo.png" alt="logo"/>
        <span><?php echo $this->getFConfig('serverName');?></span>
    </a>
</div>

<?php echo $this->renderPartial('html/slideInf');?>

<div id="usr-tinfo">
    <ul id="cp-usr-tmenu">
        <li>
            <a href="<?php echo $this->createUrl('rankings/index');?>" target="_blank">
                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Rankings');?>
            </a>
        </li>
        <li>
            <a href="<?php echo $this->createUrl('main/forum');?>"  target="_blank">
                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Forum');?>
            </a>
        </li>
        <li>
            <a id="slide-a" href="<?php echo $this->createUrl('cp/ajax',array('id'=>md5('userpanel'.$this->salt)));?>" onClick="showUserPanel(this);return false;">
            <span id="usr-upd-tinfo">
                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', Yii::app()->user->username);?>
                <img src="<?php echo Character::getCImage(Yii::app()->user->char);?>" width="20" height="20"/>
            </span>
            </a>
        </li>
    </ul>
    <a href="<?php echo $this->createUrl('cp/logout');?>" id="logout">
        <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Sign out');?>
    </a>
</div>

