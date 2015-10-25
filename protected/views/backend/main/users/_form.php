<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'notice-form',
    'enableAjaxValidation'=>true,
)); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'adm_name'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'adm_name',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'adm_name'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <?php if($model->isNewRecord): ?>
        <div class="row">
            <?php echo $form->labelEx($model,'adm_pass'); ?>
            <div class="r-right">
                <?php echo $form->textField($model,'adm_pass',array('size'=>60,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'adm_pass'); ?>
            </div>
            <div class="clear"></div>
        </div>
    <?php else: ?>
        <div class="row">
            <?php echo $form->labelEx($model,'new_pass'); ?>
            <div class="r-right">
                <?php echo $form->textField($model,"new_pass",array('size'=>60,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'new_pass'); ?>
            </div>
            <div class="clear"></div>
        </div>
    <?php endif;?>

    <div class="row">
        <?php echo $form->labelEx($model,'rname'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'rname',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'rname'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'picture'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'picture',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'picture'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <?php if(Yii::app()->user->role == "super-administrator"): ?>
        <div class="row">
        <?php
        echo $form->dropDownList($model,'role',
            array($this->getRoles()),
            array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select status').')','class'=>'cat-select')
        );?>
        <?php echo $form->error($model,'role'); ?>
            <div class="clear"></div>
        </div>
   <?php endif; ?>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add').'' : ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Update').'',array('class'=>$model->isNewRecord ? 'button add-btn' : 'button upd-btn')); ?>
        <div class="clear"></div>
    </div>


    <?php $this->endWidget(); ?>


</div>