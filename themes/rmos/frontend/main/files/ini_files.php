<div id="down-files">
    <?php foreach($links as $link):?>
        <?php if($link != ''):?>
            <div class="client-down">
                <a href="<?php echo $link;?>" target="_blank" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Download client').' '.$this->getFConfig('serverName');?>">
                    <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Download client').' '.'#'.$count++;?>
                </a>
            </div>
        <?php endif;?>
    <?php endforeach;?>
</div>