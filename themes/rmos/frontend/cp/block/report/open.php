<div id="total-tickets">
    <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Total tickets').': '.sizeof($model);?>
</div>

<div id="ticket-labels">
    <div class="title-label">
        <?php echo '(#id) '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Topic');?>
    </div>

    <div class="priority-label">
        <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Status');?>
    </div>

    <div class="messages-label">
        <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Messages');?>
    </div>
</div>
<div class="clear"></div>
<?php $count=0; if(sizeof($model) > 0):?>
<div class="tickets-block">
    <?php foreach($model as $item):?>
    <?php echo $this->renderPartial('block/report/list',array('model'=>$item));?>
    <?php endforeach;?>
</div>
<?php else:?>
<div class="empty-tickets">
    <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'List of tickets is empty');?>
</div>
<?php endif;?>