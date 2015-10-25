<?php
$this->pageTitle=Yii::app()->name . ' - Contacts';

?>

<div class="left-co-side">
    <div class="title"><?php echo $info->title; ?></div>
    <div class="map">
        <?php echo $info->map; ?>
    </div>

    <div class="address">
        <address>
            <?php echo $info->address; ?>
        </address>
    </div>
</div>

<div class="right-co-side">
    <div class="title"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Feedback'); ?></div>
    <?php echo $this->renderPartial('_contact-form', array('model'=>$model)); ?>
</div>

