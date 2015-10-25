<tr>
    <td align="center">
        <?php echo $data->id;?>
    </td>

    <td>
        <?php echo $data->title; ?>
    </td>

    <td align="center" width="150">
        <a href="<?php echo $data->url; ?>" target="_blank" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Go to page')." ".$data->title; ?>"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Go to page')?></a>
    </td>

    <td align="center">
        <img width="37" height="36" src="<?php echo CHtml::encode($data->img); ?>" alt="<?php echo $data->title; ?>" />
    </td>

    <td align="center">
        <?php if($data->active == 1): ?>
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'category-form',
                'action'=>''.Yii::app()->controller->id.'/anstatus/'.$data->id.'',
                'enableAjaxValidation'=>false,
            )); ?>
                <button class="status-btn" type="submit"><img src="/skin/backend/faicore/images/accept.png" alt="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Active'); ?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Active'); ?>"/></button>
                <input type="hidden" value="0" name="active"/>
            <?php $this->endWidget(); ?>
        <?php else: ?>
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'category-form',
                'action'=>''.Yii::app()->controller->id.'/anstatus/'.$data->id.'',
                'enableAjaxValidation'=>false,
            )); ?>
                <button class="status-btn" type="submit"><img src="/skin/backend/faicore/images/exclamation.png" alt="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Not Active'); ?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Not active'); ?>"/></button>
                <input type="hidden" value="1" name="active"/>
            <?php $this->endWidget(); ?>
        <?php endif; ?>
    </td>

    <td class="ft-actions">
        <?php echo CHtml::link('<img src="/skin/backend/faicore/images/edit.png"/>',  array('updateannouncement', 'id'=>$data->id), array('class' => 's-button', 'title'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Edit'))); ?>
        <?php echo CHtml::link('<img src="/skin/backend/faicore/images/close.png"/>', array('deleteannouncement', 'id'=>$data->id), array('class' => 's-button', 'title'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Delete'))); ?>
    </td>
</tr>
