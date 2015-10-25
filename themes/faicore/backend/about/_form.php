<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'about-form',
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
        <?php echo $form->labelEx($model,'meta_desc'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'meta_desc',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'meta_desc'); ?>
        </div>

        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'meta_key'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'meta_key',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'meta_key'); ?>
        </div>

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
		<?php echo $form->error($model,'description'); ?>
        <div class="clear"></div>
	</div>

    <div class="row">
        <?php
        echo $form->dropDownList($model,'onmpage',
            array(1=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Yes').'', 0=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'No').''),
            array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Show on "About Us"').')', 'class'=>'cat-select')
        );?>
        <?php echo $form->error($model,'onmpage'); ?>
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