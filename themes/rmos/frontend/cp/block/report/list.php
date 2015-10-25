<div class="ticket-item">
    <div class="ticket-title">
        <div class="ticket-img">
            <img src="<?php echo $this->getTemplate('core');?>images/post_active.gif" width="20" height="18" alt="ticket"/>
        </div>
        <div class="ticket-link">
            <?php echo CHtml::link('(#'.$model->id.') '.$model->topic, array('cp/ajax', 'id'=>md5('ticket'.$this->salt),'params'=>$model->id),array(
            'class'=>'s-button',
            'title'=>Yii::t(Yii::app()->request->cookies["language"]->value, 'View'),
            'onclick'=>'getTicket(this);return false;'
            ));?>
        </div>
        <div class="ticket-date">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Sent').': '.News::getDate(date("d M Y -.H:i:s",$model->date));?>
        </div>
    </div>

    <div class="ticket-priority">
        <span class="<?php echo FAI_TICKETS::getPriority($model->priority,'css');?>">
            <?php echo FAI_TICKETS::getPriority($model->priority,'word');?>
        </span>
    </div>

    <div class="ticket-message">
           <?php echo count($model->getMessage);?>
    </div>
    <div class="clear"></div>
</div>

