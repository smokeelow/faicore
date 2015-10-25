<div id="back-to-tickets">
    <a href="<?php echo $this->createUrl('cp/ajax',array('id'=>md5('opentickets'.$this->salt)));?>" onclick="getTicket(this);return false;">
        <span>&lsaquo;</span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Back');?>
    </a>
</div>

<div id="ticket-view-title">
    <ul>
        <li>
            <div class="enty">
                #ID
            </div>

            <div class="val">
                <?php echo $model->id;?>
            </div>
        </li>
        <li>
            <div class="enty">
                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Topic');?>:
            </div>

            <div class="val">
                <?php echo $model->topic;?>
            </div>
        </li>
        <li>
            <div class="enty">
                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Status');?>:
            </div>

            <div class="val">
                <?php echo FAI_TICKETS::getPriority($model->priority,'word');?>
            </div>
        </li>
        <li>
            <div class="enty">
                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Date');?>:
            </div>

            <div class="val">
                <?php echo News::getDate(date("d M Y -.H:i:s",$model->date));?>
            </div>
        </li>
    </ul>
</div>