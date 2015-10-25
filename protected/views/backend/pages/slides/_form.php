<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'pages-form',
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
        <?php echo $form->labelEx($model,'slide_1'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'slide_1',array('maxlength'=>255)); ?>
            <?php echo $form->error($model,'slide_1'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'slide_2'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'slide_2',array('maxlength'=>255)); ?>
            <?php echo $form->error($model,'slide_2'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'slide_3'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'slide_3',array('maxlength'=>255)); ?>
            <?php echo $form->error($model,'slide_3'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'slide_4'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'slide_4',array('maxlength'=>255)); ?>
            <?php echo $form->error($model,'slide_4'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'slide_5'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'slide_5',array('maxlength'=>255)); ?>
            <?php echo $form->error($model,'slide_5'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'slide_6'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'slide_6',array('maxlength'=>255)); ?>
            <?php echo $form->error($model,'slide_6'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'slide_7'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'slide_7',array('maxlength'=>255)); ?>
            <?php echo $form->error($model,'slide_7'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'slide_8'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'slide_8',array('maxlength'=>255)); ?>
            <?php echo $form->error($model,'slide_8'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'slide_9'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'slide_9',array('maxlength'=>255)); ?>
            <?php echo $form->error($model,'slide_9'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'slide_10'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'slide_10',array('maxlength'=>255)); ?>
            <?php echo $form->error($model,'slide_10'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'slide_11'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'slide_11',array('maxlength'=>255)); ?>
            <?php echo $form->error($model,'slide_11'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'slide_12'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'slide_12',array('maxlength'=>255)); ?>
            <?php echo $form->error($model,'slide_12'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'slide_13'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'slide_13',array('maxlength'=>255)); ?>
            <?php echo $form->error($model,'slide_13'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'slide_14'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'slide_14',array('maxlength'=>255)); ?>
            <?php echo $form->error($model,'slide_14'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'slide_15'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'slide_15',array('maxlength'=>255)); ?>
            <?php echo $form->error($model,'slide_15'); ?>
        </div>
        <div class="clear"></div>
    </div>

    <div class="row">
        <?php
        echo $form->dropDownList($model,'parent_page',
            Pages::getAllPages(),
            array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select a parent page').')', 'class'=>'cat-select')
        );?>
        <?php echo $form->error($model,'parent_page'); ?>
        <div class="clear"></div>
    </div>

    <div class="row">
        <?php
        echo $form->dropDownList($model,'slides_status',
            array(1=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Visualisation').'', 0=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Completed projects').''),
            array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select a section').')', 'class'=>'cat-select')
        );?>
        <?php echo $form->error($model,'slides_status'); ?>
        <div class="clear"></div>
    </div>

    <div class="row">
        <?php
        echo $form->dropDownList($model,'active',
            array(1=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Activate').'', 0=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Disable').''),
            array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select status').')', 'class'=>'cat-select')
        );?>
        <?php echo $form->error($model,'active'); ?>
        <div class="clear"></div>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add').'' : ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Update').'',array('class'=>$model->isNewRecord ? 'button add-btn' : 'button upd-btn')); ?>
        <div class="clear"></div>
    </div>


    <?php $this->endWidget(); ?>


</div>