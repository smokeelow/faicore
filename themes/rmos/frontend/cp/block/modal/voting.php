<div id="vote-buttons">
    <a href="<?php echo $this->getFConfig('mmotopURL')?>" target="_blank">
        <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Vote');?>
    </a>

    <a href="<?php echo $this->createUrl('cp/ajax',array('id'=>md5('votecheck'.$this->salt)));?>" class="check-btn" onclick="checkVoteList(this);return false;" data-notify="<?php echo Yii::t(Yii::app()->request->cookies['language']->value,'Wait a check votes');?>">
        <?php echo Yii::t(Yii::app()->request->cookies['language']->value, 'Check');?>
    </a>

    <a href="<?php echo $this->createUrl('cp/ajax', array('id'=>md5('rctransfer'.$this->salt)));?>" id="rct" class="" onclick="checkVoteList(this);return false;" data-notify="<?php echo Yii::t(Yii::app()->request->cookies['language']->value,'Wait, it is converted');?>">
        <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Transfer credit to the game');?>
    </a>
</div>

<div id="vote-wrap">
    <div class="p-line">
        <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Game credits');?>:</span>
            <span class="r-entity">
                <?php echo ceil($model->Credits);?>
            </span>
        <div class="clear"></div>
    </div>
    <div class="p-line">
        <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Web credits');?>:</span>
            <span class="r-entity">
                <?php echo ceil($model->web_credits);?>
            </span>
        <div class="clear"></div>
    </div>
    <div class="p-line">
        <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reward for simple vote via site');?>:</span>
            <span class="r-entity">
                <?php echo $this->getFConfig('voteDefAward');?>
            </span>
        <div class="clear"></div>
    </div>

    <div class="p-line">
        <span><?php echo Yii::t(Yii::app()->request->cookies['language']->value, 'Reward for vote via SMS');?>:</span>
            <span class="r-entity">
                <?php echo $this->getFConfig('voteSmsAward');?>
            </span>
        <div class="clear"></div>
    </div>
</div>


