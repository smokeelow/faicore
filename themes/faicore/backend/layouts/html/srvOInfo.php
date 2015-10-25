<div class="nextUpdate">
    <?php if($this->beginCache('servBackend', array(
    'varyByExpression'=>Yii::app()->request->cookies['language']->value,
    'duration'=>$this->getFConfig('serverCache')-120,
    'varyByRoute' => false))) { ?>
        <ul>
            <li><?php echo $this->getFConfig('serverName');?></li>
            <li><?php echo MEMBSTAT::getOnline()+$this->getFConfig('serverFOnline'); ?></li>
        </ul>
        <div class="pWrapper"><div class="progress<?php echo StaticController::getSOnline();?>" style="width: 100%;"></div></div>
    <?php $this->endCache(); } ?>
</div>