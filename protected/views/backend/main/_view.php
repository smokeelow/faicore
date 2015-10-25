<?php
/* @var $this PagesController */
/* @var $data Pages */
?>

<tr>
    <td align="center">
        <?php echo $data->id;?>
    </td>

    <td>
        <?php echo $data->set_name; ?>
    </td>

    <td align="center">
        <?php if($data->active == 1): ?>
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'category-form',
                'action'=>''.Yii::app()->controller->id.'/status/'.$data->id.'',
                'enableAjaxValidation'=>false,
            )); ?>
                <button class="status-btn" type="submit"><img src="/skin/backend/faicore/images/accept.png" alt="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Active'); ?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Active'); ?>"/></button>
                <input type="hidden" value="0" name="active"/>
            <?php $this->endWidget(); ?>
        <?php else: ?>
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'category-form',
                'action'=>''.Yii::app()->controller->id.'/status/'.$data->id.'',
                'enableAjaxValidation'=>false,
            )); ?>
                <button class="status-btn" type="submit"><img src="/skin/backend/faicore/images/exclamation.png" alt="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Not Active'); ?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Not active'); ?>"/></button>
                <input type="hidden" value="1" name="active"/>
            <?php $this->endWidget(); ?>
        <?php endif; ?>
    </td>

    <td class="ft-actions">
        <?php echo CHtml::link('<img src="/skin/backend/faicore/images/edit.png"/>', array('update',  'id'=>$data->id), array('class' => 's-button', 'title'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Edit'))); ?>
        <?php echo CHtml::link('<img src="/skin/backend/faicore/images/close.png"/>', array('delete', 'id'=>$data->id), array('class' => 's-button', 'title'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Delete'))); ?>
    </td>
</tr>
