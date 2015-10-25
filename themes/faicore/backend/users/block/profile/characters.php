<div class="chars-title-border"></div>
<div class="chars-title">
    <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Characters');?>
</div>

<?php if(sizeof($chars) > 0):?>
    <?php foreach($chars as $char):?>
        <div class="char-line">
            <span class="char-img">
                <img src="<?php echo Character::getCClass($char->Class,4);?>" alt="<?php echo Character::getCClass($char->Class,1);?>" />
            </span>
            <span class="char-name">
                <?php echo $char->Name;?>
            </span>
            <span class="char-lvl-res">
                <span class="char-lvl">
                    <span class="lvl-txt"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Level');?>:</span>
                    <span class="lvl"><?php echo $char->cLevel;?></span>
                </span>,
                <span class="char-res">
                    <span class="lvl-txt"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset');?>:</span>
                    <span class="lvl"><?php $reset=$this->getFConfig('reset_col'); echo $char->$reset;?></span>
                </span>
            </span>
            <span class="char-class <?php echo Character::getCClass($char->Class,3);?>">
                <?php echo Character::getCClass($char->Class,1);?>
            </span>
            <span class="char-money">
                <img src="<?php echo $this->getTemplate('backend');?>images/coins.png">
                <?php echo number_format($char->Money);?>
            </span>

            <span class="char-actions">
                <span class="lock-char-action">
                    <?php if($char->CtlCode != 1):?>
                        <?php echo CHtml::link(
                            '<img src="'.$this->getTemplate('backend').'images/ban.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Lock character').'"/>',
                            array('lockchar', 'alias'=>$char->Name),
                            array('class'=>'action-item', 'onClick'=>'getLockAction(this);return false;', 'title'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Lock character')));?>
                    <?php else:?>
                        <?php echo CHtml::link(
                            '<img class="unlck" src="'.$this->getTemplate('backend').'images/lock-unlock.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Unlock character').'"/>',
                            array('unlockchar', 'alias'=>$char->Name),
                            array('class'=>'action-item', 'onClick'=>'getUnLockAction(this);return false;', 'title'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Unlock character')));?>
                    <?php endif;?>

                </span>
            </span>
        </div>
    <?php endforeach;?>
<?php endif;?>