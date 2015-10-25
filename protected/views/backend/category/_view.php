<tr>
    <td align="center">
        <?php echo $data->position;?>
    </td>

    <td>
        <?php echo News::model()->strCut($data->name); ?>
    </td>

    <td>
        <?php echo $data->url; ?>
    </td>

    <td>
        <?php foreach($data->parent as $item): ?>
            <span class="subcat">
                     <?php echo $item->name; ?>
                    (<span class="pages" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Pages count')?>"><?php echo sizeof($item->pages);?></span>)
                    <?php echo CHtml::link('x', array('chiremove', 'url'=>$item->url), array('title'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Delete'))); ?>
            </span>
        <?php endforeach;?>
    </td>

    <td align="center">
        <?php if (isset($data->child)): ?>
            <span class="parent">
                <span  title="
                    <h2 class='t-chead'><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Subcategories'); ?></h2>
                    <?php  foreach (Category::getChilds($data->child->id) as $item): ?>
                        <div class='t-subcat'>
                            <?php echo $item->name; ?>
                            <span class='t-cnum'>#<?php echo $item->position; ?></span>
                            <div class='clear'></div>
                        </div>
                    <?php endforeach; ?>
                "><?php echo $data->child->name; ?></span>
                <?php echo CHtml::link('x', array('paremove', 'url'=>$data->url), array('title'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Delete'))); ?>
            </span>
        <?php endif; ?>
    </td>

    <td align="center">
        <?php echo sizeof($data->pages); ?>
    </td>

    <td align="center">
        <?php if(sizeof($data->child) > 0): ?>
            <?php if ($data->child->project_status == 1): ?>
                <img src="/skin/backend/faicore/images/accept.png" alt="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Ready'); ?> (<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Status defined by category'); ?>)" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Ready'); ?> (<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Status defined by parent category'); ?>)"/>
            <?php elseif($data->child->project_status == 0): ?>
                <img src="/skin/backend/faicore/images/old-openofficeorg-draw.png" alt="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'In develop'); ?> (<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Status defined by category'); ?>)" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'In develop'); ?> (<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Status defined by parent category'); ?>)"/>
            <?php endif;?>
        <?php else: ?>
            <?php if($data->project_status == 1): ?>
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'category-form',
                    'action'=>''.Yii::app()->controller->id.'/ready/'.$data->url.'',
                    'enableAjaxValidation'=>false,
                )); ?>
                    <button class="status-btn" type="submit"><img src="/skin/backend/faicore/images/accept.png" alt="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Completed'); ?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Completed'); ?>"/></button>
                    <input type="hidden" value="0" name="project_status"/>
                <?php $this->endWidget(); ?>
            <?php else: ?>
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'category-form',
                    'action'=>''.Yii::app()->controller->id.'/ready/'.$data->url.'',
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
                'action'=>''.Yii::app()->controller->id.'/status/'.$data->url.'',
                'enableAjaxValidation'=>false,
            )); ?>
                <button class="status-btn" type="submit"><img src="/skin/backend/faicore/images/accept.png" alt="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Active'); ?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Active'); ?>"/></button>
                <input type="hidden" value="0" name="active"/>
            <?php $this->endWidget(); ?>
        <?php else: ?>
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'category-form',
                'action'=>''.Yii::app()->controller->id.'/status/'.$data->url.'',
                'enableAjaxValidation'=>false,
            )); ?>
                <button class="status-btn" type="submit"><img src="/skin/backend/faicore/images/exclamation.png" alt="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Not Active'); ?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Not active'); ?>"/></button>
                <input type="hidden" value="1" name="active"/>
            <?php $this->endWidget(); ?>
        <?php endif; ?>
    </td>

    <td class="ft-actions">
        <?php echo CHtml::link('<img src="/skin/backend/faicore/images/edit.png"/>', array('edit',    'url'=>$data->url), array('class' => 's-button', 'title'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Edit'))); ?>
        <?php echo CHtml::link('<img src="/skin/backend/faicore/images/close.png"/>', array('delete', 'url'=>$data->url), array('class' => 's-button', 'title'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Delete'))); ?>
    </td>
</tr>