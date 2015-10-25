<div class="i-line char-class">
    <?php echo Character::model()->getCClass($model->Class,0);?>
</div>

<div class="i-line char-online">
    <span class="<?php echo Character::model()->getIntToTxt(Character::model()->getOInfo(Yii::app()->user->username, $model->Name));?>">
        <?php echo ucfirst(Character::model()->getIntToTxt(Character::model()->getOInfo(Yii::app()->user->username, $model->Name)));?>
    </span>
</div>

<div class="i-line char-greset">
    <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Grand reset');?>:</span>
    <span class="r-entity"><?php $greset = $this->getFConfig('greset_col'); echo $model->$greset;?></span>
    <div class="clear"></div>
</div>

<div class="i-line char-reset">
    <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset');?>:</span>
    <span class="r-entity"><?php $reset = $this->getFConfig('reset_col'); echo $model->$reset;?></span>
    <div class="clear"></div>
</div>

<div class="i-line char-level">
    <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Level');?>:</span>
    <span class="r-entity"><?php echo $model->cLevel;?></span>
    <div class="clear"></div>
</div>

<div class="i-line char-zen">
    <span><img title="zen" class="tooltip" src="<?php echo $this->getTemplate('core');?>images/coins.png" alt="zen" /></span>
    <span class="r-entity"><?php echo number_format($model->Money);?></span>
    <div class="clear"></div>
</div>

