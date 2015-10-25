<?php
if($model->sender == 1)
{
    $class = 'by_me';
    $image = $this->getTemplate('core').'images/agent.png';
    $imgClass = 'sup-avatar';
}
else
{
    $class = 'by_user';
    $imgClass = 'usr-avatar';

    if(Account::checkUserPic())
    {
        $image = Account::userAvatar()->usr_avatar;
    }
    else
    {
        $image = $this->getTemplate('core').'images/no-avatar.png';
    }
}

?>

<li class="divider"><span></span></li>

<li class="<?php echo $class;?>">
    <a href="#" onClick="return false;" title="">
        <?php if($model->photo != ''):?>
        <?php else:?>
        <img src="<?php echo $image;?>" class="<?php echo $imgClass;?>" width="45" height="45" alt="user"/>
        <?php endif;?>
    </a>

   <?php if(false == true):?>
        <div class="edit-message">
            <?php echo CHtml::link('<img src="'.$this->getTemplate('backend').'/images/smallEdit.png"/>', array('editpost', 'id'=>$model->id),array('class'=>'tooltip','title'=>Yii::t(Yii::app()->request->cookies["language"]->value, 'Edit')));?>
            <?php echo CHtml::link('<img src="'.$this->getTemplate('backend').'/images/smallDelete.png"/>', array('deletepost', 'id'=>$model->id),array('class'=>'tooltip','title'=>Yii::t(Yii::app()->request->cookies["language"]->value, 'Delete')));?>
        </div>
    <?php endif;?>

    <div class="messageArea">
        <span class="aro"></span>
        <div class="infoRow">
            <span class="name">
                <?php if($model->sender == 1):?>
                    <strong><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Support agent');?></strong>
                <?php else:?>
                    <strong><?php echo $model->name;?></strong>
                <?php endif;?>

                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'says');?>:</span>
            <span class="time">
                <?php
                if($model->upd_type == 1)
                    $text = 'Updated';
                else
                    $text = 'Sent';

                echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', $text).': '.News::getDate(date("d M Y -.H:i:s",$model->date));
                ?>
            </span>
            <div class="clear"></div>
        </div>
            <div class="<?php echo $class;?>-type"><?php echo$model->message;?></div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</li>