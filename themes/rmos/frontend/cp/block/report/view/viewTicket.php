<div id="cp-ticket-view">
    <?php echo $this->renderPartial('block/report/view/title', array('model'=>$model));?>
    <ul class="messagesOne">
        <li class="by_user">
            <?php if(Account::checkUserPic()): ?>
                <a href="#" onclick="return false;" title="<?php echo $model->memb___id;?>">
                    <img src="<?php echo Account::userAvatar()->usr_avatar;?>" class="usr-avatar" alt="user" width="45" height="45"/>
                </a>
            <?php else: ?>
                <a href="#" onclick="return false;" title="<?php echo $model->memb___id;?>">
                    <img src="<?php echo $this->getTemplate('core');?>images/no-avatar.png" class="usr-avatar" width="45" heigth="45" alt="user"/>
                </a>
            <?php endif; ?>
            <div class="messageArea">
                <span class="aro"></span>
                <div class="infoRow">
                    <span class="name"><strong><?php echo $model->memb___id;?></strong> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'says');?>:</span>
                    <span class="time"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Sent').': '.News::getDate(date("d M Y -.H:i:s",$model->date));?></span>
                    <div class="clear"></div>
                </div>
                <?php echo $model->description;?>
            </div>
            <div class="clear"></div>
        </li>

        <?php foreach($model->getMessage as $item): ?>
        <div class="hide"><?php echo ++$count;?></div>
            <?php  echo $this->renderPartial('block/report/view/post',array('model'=>$item, 'count'=>$count));?>
        <?php endforeach;?>
    </ul>
</div>

<div id="ticket-post-form">
    <?php echo $this->renderPartial('block/report/view/_postForm',array('model'=>$post,'id'=>$model->id));?>
</div>

