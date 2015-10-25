<tr>
    <td align="center">
        <?php echo $data->id;?>
    </td>

    <td>
        <?php echo $data->title; ?>
    </td>

    <td>
        <?php echo News::getDate(date('d M Y -.H:s:i',$data->date)); ?>
    </td>

    <td align="center">
        <?php if($data->onmpage == 1): ?>
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'category-form',
            'action'=>''.Yii::app()->controller->id.'/mpage/'.$data->id.'',
            'enableAjaxValidation'=>false,
        )); ?>
        <button class="status-btn" type="submit"><img src="<?php echo $this->getTemplate('backend');?>images/accept.png" alt="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Active'); ?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Active'); ?>"/></button>
        <input type="hidden" value="0" name="main"/>
        <?php $this->endWidget(); ?>
        <?php else: ?>
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'category-form',
            'action'=>''.Yii::app()->controller->id.'/mpage/'.$data->id.'',
            'enableAjaxValidation'=>false,
        )); ?>
        <button class="status-btn" type="submit"><img src="<?php echo $this->getTemplate('backend');?>images/exclamation.png" alt="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Not Active'); ?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Not active'); ?>"/></button>
        <input type="hidden" value="1" name="main"/>
        <?php $this->endWidget(); ?>
        <?php endif; ?>
    </td>

    <td align="center">
        <?php if($data->status == 1): ?>
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'category-form',
            'action'=>''.Yii::app()->controller->id.'/status/'.$data->id.'',
            'enableAjaxValidation'=>false,
        )); ?>
        <button class="status-btn" type="submit"><img src="<?php echo $this->getTemplate('backend');?>images/accept.png" alt="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Active'); ?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Active'); ?>"/></button>
        <input type="hidden" value="0" name="status"/>
        <?php $this->endWidget(); ?>
        <?php else: ?>
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'category-form',
            'action'=>''.Yii::app()->controller->id.'/status/'.$data->id.'',
            'enableAjaxValidation'=>false,
        )); ?>
        <button class="status-btn" type="submit"><img src="<?php echo $this->getTemplate('backend');?>images/exclamation.png" alt="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Not Active'); ?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Not active'); ?>"/></button>
        <input type="hidden" value="1" name="status"/>
        <?php $this->endWidget(); ?>
        <?php endif; ?>
    </td>

    <td class="ft-actions">
        <?php echo CHtml::link('<img src="'.$this->getTemplate('backend').'images/edit.png"/>', array('update',  'id'=>$data->id), array('class' => 's-button', 'title'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Edit'))); ?>
        <?php echo CHtml::link('<img src="'.$this->getTemplate('backend').'images/close.png"/>', array('delete', 'id'=>$data->id), array('class' => 's-button', 'title'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Delete'))); ?>
    </td>
</tr>
