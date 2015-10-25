<div class="l-side">
    <div class="char-name">
        <?php echo $item->Name;?>
    </div>

    <div class="char-pic">
        <img src="<?php echo $model->getCClass($item->Class,4);?>" alt="<?php echo $model->getCClass($item->Class,1);?>" />
    </div>

    <div class="char-bar-info">
        <div class="i-line char-class">
            <?php echo $model->getCClass($item->Class,0);?>
        </div>

        <div class="i-line char-online">
                <span class="<?php echo $model->getIntToTxt($model->getOInfo(Yii::app()->user->username, $item->Name));?>">
                    <?php echo ucfirst($model->getIntToTxt($model->getOInfo(Yii::app()->user->username, $item->Name)));?>
                </span>
        </div>

        <div class="i-line char-greset">
            <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Grand reset');?>:</span>
            <span class="r-entity"><?php $greset = $this->getFConfig('greset_col'); echo $item->$greset;?></span>
            <div class="clear"></div>
        </div>

        <div class="i-line char-reset">
            <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset');?>:</span>
            <span class="r-entity"><?php $reset = $this->getFConfig('reset_col'); echo $item->$reset;?></span>
            <div class="clear"></div>
        </div>

        <div class="i-line char-level">
            <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Level');?>:</span>
            <span class="r-entity"><?php echo $item->cLevel;?></span>
            <div class="clear"></div>
        </div>

        <div class="i-line char-zen">
            <span><img title="zen" src="<?php echo $this->getTemplate('core');?>images/coins.png" alt="zen" /></span>
            <span class="r-entity"><?php echo number_format($item->Money);?></span>
            <div class="clear"></div>
        </div>
    </div>
</div>