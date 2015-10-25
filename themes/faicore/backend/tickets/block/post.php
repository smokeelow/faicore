<?php
    if($model->sender == 1)
        $class = 'by_me';
    else
        $class = 'by_user';
?>

<li class="divider"><span></span></li>

<li class="<?php echo $class;?>">
    <a href="#" title="">
        <?php if($model->photo != ''):?>
            dfsdf
        <?php else:?>
            <img src="<?php echo $this->getTemplate('backend');?>images/stock_person.png" alt="user"/>
        <?php endif;?>
    </a>

    <div class="edit-message">
        <?php echo CHtml::link('<img src="'.$this->getTemplate('backend').'/images/smallEdit.png"/>', array('editpost', 'id'=>$model->id),array('title'=>Yii::t(Yii::app()->request->cookies["language"]->value, 'Edit')));?>
        <?php echo CHtml::link('<img src="'.$this->getTemplate('backend').'/images/smallDelete.png"/>', array('deletepost', 'id'=>$model->id),array('title'=>Yii::t(Yii::app()->request->cookies["language"]->value, 'Delete')));?>
    </div>

    <div class="messageArea">
        <span class="aro"></span>
        <div class="infoRow">
            <span class="name"><strong><?php echo $model->name;?></strong> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'says');?>:</span>
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
            <?php echo $model->message;?>

        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</li>