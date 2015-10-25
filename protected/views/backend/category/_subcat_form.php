<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
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
        <?php echo $form->labelEx($model,'url'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>100)); ?>
            <?php echo $form->error($model,'url'); ?>
        </div>

        <div class="clear"></div>
    </div>

    <?php if (sizeof($model->parent) <= 0): ?>
        <div class="row">
            <?php echo $model->isNewRecord ?
                $form->dropDownList($model,'parent_id',
                    Category::All(),
                    array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select parent category').')', 'class'=>'cat-select')
                )

                :

                $form->dropDownList($model,'parent_id',
                    Category::AllSub($model->id),
                    array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select parent category').')', 'class'=>'cat-select')
                );
            ?>
            <?php echo $form->error($model,'parent_id'); ?>
            <div class="clear"></div>
        </div>
    <?php endif; ?>

    <div class="row">
        <?php
        echo $form->dropDownList($model,'project_status',
            array(1=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Ready').'', 0=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'In develop').''),
            array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Category projects status').')', 'class'=>'cat-select')
        );?>
        <?php echo $form->error($model,'project_status'); ?>
        <div class="clear"></div>
    </div>

    <div class="row">
        <?php
        echo $form->dropDownList($model,'active',
            array(1=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Activate').'', 0=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Disable').''),
            array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select status').')', 'class'=>'cat-select')
        );?>
        <?php echo $form->error($model,'active'); ?>
        <div class="clear"></div>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add').'' : ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Update').'',array('class'=>$model->isNewRecord ? 'button add-btn' : 'button upd-btn')); ?>
        <div class="clear"></div>
    </div>



<?php $this->endWidget(); ?>

</div><!-- form -->