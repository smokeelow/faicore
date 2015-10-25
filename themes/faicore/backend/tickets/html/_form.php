<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'ticket-form',
    'enableAjaxValidation'=>true,
)); ?>

    <div class="row">
        <?php $this->widget('application.extensions.TheCKEditor.TheCKEditorWidget',array(
        'model'=>$post,
        'attribute'=>'message',
        'height'=>'200px',
        'width'=>'100%',
        'toolbarSet'=>'Full',
        'ckeditor'=>Yii::app()->basePath.'/../ckeditor/ckeditor.php',
        'ckBasePath'=>Yii::app()->baseUrl.'/ckeditor/',
    ) ); ?>
        <?php echo $form->error($post,'message'); ?>
        <div class="clear"></div>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::app()->controller->action->id == 'view' ? ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Send').'' : ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Update').'',array('class'=>Yii::app()->controller->action->id == 'view' ? 'button add-btn' : 'button upd-btn')); ?>
        <div class="clear"></div>
    </div>


    <?php $this->endWidget(); ?>


</div>