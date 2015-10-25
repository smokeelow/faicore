<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Error').' '. $code;
$this->breadcrumbs=array(
	''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Error').' '.$code.'',
);
?>

<div class="errorWrapper">
    <span class="errorNum"><?php echo $code; ?></span>
    <div class="errorContent">
        <span class="errorDesc"><span class="icon-warning"></span> <?php echo CHtml::encode($message); ?></span>
        <div class="fluid">
            <a href="/" title="" class="btn"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Go home') ?></a>
         </div>
    </div>
</div>
    <div class="faicore"><a href="http://www.faicore.com">www.faicore.com</a></div>