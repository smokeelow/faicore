<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'staff-form',
	'enableAjaxValidation'=>true,
)); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
        <div class="r-right">
		    <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'name'); ?>
        </div>

        <div class="clear"></div>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,$model->isNewRecord ? 'password' : 'newPass'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,$model->isNewRecord ? 'password' : 'newPass',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,$model->isNewRecord ? 'password' : 'newPass'); ?>
        </div>

        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'photo'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'photo',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'photo'); ?>
        </div>

        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'rname'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'rname',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'rname'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <?php if(Yii::app()->user->role != 'journalist' && Yii::app()->user->role != 'moderator' && Yii::app()->user->role != 'administrator' && Yii::app()->user->role == 'super-administrator'):?>
        <div class="row">
            <?php
            echo
            $form->dropDownList($model,'access',
                AdminGroup::getAccess(),
                array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select status').')', 'class'=>'cat-select')
            );?>
            <?php echo $form->error($model,'access'); ?>
            <div class="clear"></div>
        </div>
    <?php endif;?>

    <?php if(Yii::app()->user->role != 'journalist' && Yii::app()->user->role != 'moderator' && Yii::app()->user->role != 'administrator' && Yii::app()->user->role == 'super-administrator'):?>
        <div class="row">
            <?php
            echo
                $form->dropDownList($model,'status',
                AdminGroup::getRoles('list'),
                array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select user access status').')', 'class'=>'cat-select')
            );?>
            <?php echo $form->error($model,'status'); ?>
            <div class="clear"></div>
        </div>
    <?php endif;?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add').'' : ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Update').'',array('class'=>$model->isNewRecord ? 'button add-btn' : 'button upd-btn')); ?>
        <div class="clear"></div>
	</div>


<?php $this->endWidget(); ?>


</div>