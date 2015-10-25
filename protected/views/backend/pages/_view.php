<tr>
    <td align="center">
        <?php echo $data->position ;?>
    </td>

    <td>
        <?php echo News::model()->strCut(CHtml::encode($data->title)); ?>
    </td>

    <td align="center">
        <?php foreach ($data->category as $item): ?>
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'pages-form',
                'action'=>''.Yii::app()->controller->id.'/catremove/'.$data->alias.'',
                'enableAjaxValidation'=>false,
            )); ?>
                <span class="cat-del"><?php echo $item->name;?><button title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Delete') ?>" type="submit">x</button></span>
                <input type="hidden" value="<?php echo $item->id ?>" name="catid"/>
            <?php $this->endWidget(); ?>
        <?php endforeach;?>
    </td>

    <td>
        <?php echo CHtml::encode($data->alias); ?>
    </td>

    <td>
        <?php echo CHtml::encode($data->date); ?>
    </td>

    <td class="n-img" align="center">
        <img src="<?php echo CHtml::encode($data->img); ?>" alt="<?php echo CHtml::encode($data->title); ?>" title="<?php echo CHtml::encode($data->title); ?>"  width="37" height="36"/>
    </td>

    <td align="center">
        <?php if(sizeof($data->category) > 0): ?>
            <?php foreach ($data->category as $item): ?>
                <?php if($item->project_status == 1): ?>
                    <img src="/skin/backend/faicore/images/accept.png" alt="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Ready'); ?> (<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Status defined by category'); ?>)" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Ready'); ?> (<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Status defined by category'); ?>)"/>
                <?php elseif($item->project_status == 0): ?>
                    <img src="/skin/backend/faicore/images/old-openofficeorg-draw.png" alt="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'In develop'); ?> (<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Status defined by category'); ?>)" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'In develop'); ?> (<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Status defined by category'); ?>)"/>
                <?php endif; ?>
            <?php endforeach;?>
        <?php else: ?>
            <?php if($data->project_status == 1): ?>
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'category-form',
                    'action'=>''.Yii::app()->controller->id.'/ready/'.$data->alias.'',
                    'enableAjaxValidation'=>false,
                )); ?>
                    <button class="status-btn" type="submit"><img src="/skin/backend/faicore/images/accept.png" alt="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Completed'); ?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Completed'); ?>"/></button>
                    <input type="hidden" value="0" name="project_status"/>
                <?php $this->endWidget(); ?>
            <?php else: ?>
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'category-form',
                    'action'=>''.Yii::app()->controller->id.'/ready/'.$data->alias.'',
                    'enableAjaxValidation'=>false,
                )); ?>
                    <button class="status-btn" type="submit"><img src="/skin/backend/faicore/images/old-openofficeorg-draw.png" alt="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'In develop'); ?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'In develop'); ?>"/></button>
                    <input type="hidden" value="1" name="project_status"/>
                <?php $this->endWidget(); ?>
            <?php endif; ?>
        <?php endif; ?>
    </td>

    <td align="center">
        <?php if($data->active == 1): ?>
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'category-form',
                'action'=>''.Yii::app()->controller->id.'/status/'.$data->alias.'',
                'enableAjaxValidation'=>false,
            )); ?>
                <button class="status-btn" type="submit"><img src="/skin/backend/faicore/images/accept.png" alt="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Active'); ?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Active'); ?>"/></button>
                <input type="hidden" value="0" name="active"/>
            <?php $this->endWidget(); ?>
        <?php else: ?>
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'category-form',
                'action'=>''.Yii::app()->controller->id.'/status/'.$data->alias.'',
                'enableAjaxValidation'=>false,
            )); ?>
                <button class="status-btn" type="submit"><img src="/skin/backend/faicore/images/exclamation.png" alt="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Not Active'); ?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Not active'); ?>"/></button>
                <input type="hidden" value="1" name="active"/>
            <?php $this->endWidget(); ?>
        <?php endif; ?>
    </td>

    <td class="ft-actions">
        <?php echo CHtml::link('<img src="/skin/backend/faicore/images/edit.png"/>', array('update',  'alias'=>$data->alias), array('class' => 's-button', 'title'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Edit'))); ?>
        <?php echo CHtml::link('<img src="/skin/backend/faicore/images/close.png"/>', array('delete', 'alias'=>$data->alias), array('class' => 's-button', 'title'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Delete'))); ?>
    </td>
</tr>
