<?php
$this->pageTitle=Yii::app()->name . ' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel').' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Deletion of admin').'';
?>

<div class="wrapper">
    <div class="page-title">
        <h1><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Security code')?></h1>
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
    <div class="widget sec-widget">
        <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'notice-form',
        'enableAjaxValidation'=>true,
        )); ?>

        <div class="row">
            <?php echo $form->labelEx($model,'sec_code'); ?>

            <div class="r-right">
               <div><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'You must enter a security code to delete')." ".$model->adm_name;?></div>
                <?php echo $form->textField($model,'sec_code',array('size'=>60,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'sec_code'); ?>
        </div>
        </div>
                <div class="row buttons">

                    <?php echo CHtml::submitButton(''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Delete').'',array('class'=>'button del-btn')); ?>
                    <div class="clear"></div>
                </div>

        <?php $this->endWidget(); ?>
    </div>
</div>
