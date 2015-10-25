<?php
/* @var $this PagesController */
/* @var $data Pages */
?>

<tr>
    <td align="center">
        <?php echo $data->id;?>
    </td>

    <td>
        <?php echo $data->title; ?>
    </td>
    
    <td align="center">
        <?php if($data->active == 1): ?>
            <img src="/skin/backend/faicore/images/accept.png" alt="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Active'); ?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Active'); ?>"/>
        <?php else: ?>
            <img src="/skin/backend/faicore/images/exclamation.png" alt="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Not Active'); ?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Not active'); ?>"/>
        <?php endif; ?>
    </td>

    <td class="ft-actions">
        <?php echo CHtml::link('<img src="/skin/backend/faicore/images/edit.png"/>', array('update',  'id'=>$data->id), array('class' => 's-button')); ?>
        <?php echo CHtml::link('<img src="/skin/backend/faicore/images/close.png"/>', array('delete', 'id'=>$data->id), array('class' => 's-button')); ?>
    </td>
</tr>
