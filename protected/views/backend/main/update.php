<?php
$this->pageTitle=Yii::app()->name . ' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin Panel').' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Editing').'';
?>


<div class="wrapper">
    <div class="page-title">
        <h1><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Editing')?> </h1>
    </div>
</div>



<div class="divider"></div>

<div class="t-h-row">
    <div class="wrapper">
        <ul>
            <li><?php echo CHtml::link('<img src="/skin/backend/images/go-back.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Back').'"/><span>'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Back').'</span>', '#', array('id'=>'back-btn')) ?></li>
        </ul>
    </div>
</div>

<div class="divider"></div>

<div class="wrapper">
    <div class="widget">
        <div class="title">
            <img class="t-icon" src="/skin/backend/faicore/images/edit.png" />
            <h6><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Form of edit')?></h6></div>

        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>