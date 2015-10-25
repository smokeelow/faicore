<ul class="messagesOne">
    <li class="by_user">
        <a href="#" title=""><img src="<?php echo $this->getTemplate('backend');?>images/stock_person.png" alt="user"/></a>
        <div class="messageArea">
            <span class="aro"></span>
            <div class="infoRow">
                <span class="name"><strong><?php echo $model->memb___id;?></strong> (<?php echo $model->character;?>) <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'says');?>:</span>
                <span class="time"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Sent').': '.News::getDate(date("d M Y -.H:i:s",$model->date));?></span>
                <div class="clear"></div>
            </div>
                <?php echo $model->description;?>
        </div>
        <div class="clear"></div>
    </li>





    <?php foreach($model->getMessage as $item): ?>
        <div class="hide"><?php echo ++$count;?></div>
        <?php  echo $this->renderPartial('block/post',array('model'=>$item, 'count'=>$count));?>
    <?php endforeach;?>
</ul>



