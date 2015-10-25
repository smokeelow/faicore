<?php
    $this->pageTitle=Yii::app()->getFConfig('serverName') .' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel').' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'News').' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Editing').' / '.$model->title;
?>


<div class="wrapper">
    <div class="page-title">
        <h1><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'News').' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Editing').' / '.$model->title?></h1>
    </div>
</div>

<div class="divider"></div>

<div class="t-h-row">
    <div class="wrapper">
        <ul>
            <li><?php echo CHtml::link('<img src="'.$this->getTemplate('backend').'images/go-back.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add set of slides').'"/><span>'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Back').'</span>', '#', array('id'=>'back-btn')) ?></li>
        </ul>
    </div>
</div>

<div class="divider"></div>

<div class="get-space"></div>

<div class="wrapper">
    <div class="widget">
        <div class="title">
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/edit.png" />
            <h6><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Form of edit news')?></h6></div>

            <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>