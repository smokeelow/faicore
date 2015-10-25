<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'cp-form',
        'enableAjaxValidation'=>true,
    )); ?>

    <?php echo $this->renderPartial('block/settings/avatar',array('form'=>$form,'model'=>$model));?>
    <?php echo $this->renderPartial('block/settings/name',array('form'=>$form,'model'=>$model));?>
    <?php echo $this->renderPartial('block/settings/email',array('form'=>$form,'model'=>$model));?>
    <?php echo $this->renderPartial('block/settings/password',array('form'=>$form,'model'=>$model));?>
    <?php echo $this->renderPartial('block/settings/js',array('form'=>$form,'model'=>$model));?>

    <div class="acc-set-section n-a">
        <div class="row buttons">
            <?php echo CHtml::submitButton(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Save'),array('class'=>$model->isNewRecord ? 'button add-btn' : 'button upd-btn')); ?>
            <div class="clear"></div>
        </div>
    </div>

    <?php $this->endWidget(); ?>
</div>
