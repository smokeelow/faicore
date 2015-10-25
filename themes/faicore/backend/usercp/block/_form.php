<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	'enableAjaxValidation'=>true,
)); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
        <div class="r-right">
		    <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'title'); ?>
        </div>

        <div class="clear"></div>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'img'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'img',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'img'); ?>
        </div>

        <div class="clear"></div>
    </div>

    <div class="row">
        <div><?php echo $form->labelEx($model,'s_desc'); ?></div>
        <?php $this->widget('application.extensions.TheCKEditor.TheCKEditorWidget',array(
        'model'=>$model,
        'attribute'=>'s_desc',
        'height'=>'200px',
        'width'=>'100%',
        'toolbarSet'=>'Full',
        'ckeditor'=>Yii::app()->basePath.'/../ckeditor/ckeditor.php',
        'ckBasePath'=>Yii::app()->baseUrl.'/ckeditor/',
    ) ); ?>
        <?php echo $form->error($model,'s_desc'); ?>
        <div class="clear"></div>
    </div>

	<div class="row">
		<div><?php echo $form->labelEx($model,'description'); ?></div>
        <?php $this->widget('application.extensions.TheCKEditor.TheCKEditorWidget',array(
            'model'=>$model,
            'attribute'=>'description',
            'height'=>'200px',
            'width'=>'100%',
            'toolbarSet'=>'Full',
            'ckeditor'=>Yii::app()->basePath.'/../ckeditor/ckeditor.php',
            'ckBasePath'=>Yii::app()->baseUrl.'/ckeditor/',
         ) ); ?>
		<?php echo $form->error($model,'s_desc'); ?>
        <div class="clear"></div>
	</div>

    <div class="row">
        <?php
        echo $form->dropDownList($model,'status',
            array(1=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Activate').'', 0=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Disable').''),
            array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select status').')', 'class'=>'cat-select')
        );?>
        <?php echo $form->error($model,'status'); ?>
        <div class="clear"></div>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add').'' : ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Update').'',array('class'=>$model->isNewRecord ? 'button add-btn' : 'button upd-btn')); ?>
        <div class="clear"></div>
	</div>


<?php $this->endWidget(); ?>


</div>