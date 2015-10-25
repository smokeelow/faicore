<?php echo $this->renderPartial('html/messages');?>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'cp-form',
    'action'=>$this->createUrl('cp/ajax',array('id'=>md5('points'.$this->salt))),
    'enableAjaxValidation'=>false,
)); ?>

<div id="action-form">

    <?php echo $form->errorSummary($model); ?>

    <div class="a-line">
        <div class="p-line">
            <span><?php echo $form->labelEx($model,'Str') ?>(<?php echo $model->Strength;?>):</span>
            <span class="r-entity">
                <?php echo $form->textField($model,'Str',array('size'=>60,'maxlength'=>255)); ?>
            </span>
            <div class="clear"></div>
        </div>

        <div class="p-line">
            <span><?php echo $form->labelEx($model,'Dex') ?>(<?php echo $model->Dexterity;?>):</span>
            <span class="r-entity">
                <?php echo $form->textField($model,'Dex',array('size'=>60,'maxlength'=>255)); ?>
            </span>
            <div class="clear"></div>
        </div>

        <div class="p-line">
            <span><?php echo $form->labelEx($model,'Vit') ?>(<?php echo $model->Vitality;?>):</span>
            <span class="r-entity">
                <?php echo $form->textField($model,'Vit',array('size'=>60,'maxlength'=>255)); ?>
            </span>
            <div class="clear"></div>
        </div>

        <div class="p-line">
            <span><?php echo $form->labelEx($model,'Ene') ?>(<?php echo $model->Energy;?>):</span>
            <span class="r-entity">
                <?php echo $form->textField($model,'Ene',array('size'=>60,'maxlength'=>255)); ?>
            </span>
            <div class="clear"></div>
        </div>

        <?php if($model->Class == 64 || $model->Class == 65 || $model->Class == 66):?>
            <div id="dl-spec-points" class="p-line">
                <span><?php echo $form->labelEx($model,'Com') ?>(<?php echo $model->Leadership;?>):</span>
                <span class="r-entity">
                    <?php echo $form->textField($model,'Com',array('size'=>60,'maxlength'=>255)); ?>
                </span>
                <div class="clear"></div>
            </div>
        <?php endif;?>

        <div class="r-price">
            <div class="count-points">
                <div class="total-points">
                    <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Free points');?>:</span>
                    <span id="all-points" data-points="<?php echo $model->LevelUpPoint;?>" data-val="0"><?php echo $model->LevelUpPoint;?></span>
                </div>
            </div>
        </div>

        <div class="buttons">
            <div class="action-buttons">
                <button href="#" class="fai-button" onclick="getAjaxForm(jQuery('#cp-form'),'#action',false); return false;">
                    <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add')?>
                </button>

                <button href="#" class="fai-button" onclick="getAjax('<?php echo $this->createUrl('ajax',array('id'=>md5('resetpoints'.$this->salt)));?>','#action'); return false;">
                    <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset points')?>
                </button>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
<?php echo $this->renderPartial('html/coreJs');?>


