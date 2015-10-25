<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'home-form',
    'enableAjaxValidation'=>true,
)); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'set_name'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'set_name',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'set_name'); ?>
        </div>
        <div class="clear"></div>
    </div>


        <div class="row">
            <?php echo $form->labelEx($model,'slide_img1'); ?>
            <div class="r-right">
                <?php echo $form->textField($model,'slide_img1',array('size'=>60,'maxlength'=>255, 'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Image url'))); ?>
                <?php echo $form->error($model,'slide_img1'); ?>
            </div>

            <div class="r-right">
                <?php echo $form->textField($model,'slide_img1_txt',array('size'=>60,'maxlength'=>255, 'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Description'))); ?>
                <?php echo $form->error($model,'slide_img1_txt'); ?>
            </div>

            <div class="r-right">
                <?php echo $form->textField($model,'slide_img1_link',array('size'=>60,'maxlength'=>255, 'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'URL'))); ?>
                <?php echo $form->error($model,'slide_img1_link'); ?>
            </div>

            <div class="clear"></div>
        </div>



        <div class="row">
            <?php echo $form->labelEx($model,'slide_img2'); ?>

            <div class="r-right">
                <?php echo $form->textField($model,'slide_img2',array('size'=>60,'maxlength'=>255, 'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Image url'))); ?>
                <?php echo $form->error($model,'slide_img2'); ?>
            </div>

            <div class="r-right">
                <?php echo $form->textField($model,'slide_img2_txt',array('size'=>60,'maxlength'=>255, 'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Description'))); ?>
                <?php echo $form->error($model,'slide_img2_txt'); ?>
            </div>

            <div class="r-right">
                <?php echo $form->textField($model,'slide_img2_link',array('size'=>60,'maxlength'=>255, 'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'URL'))); ?>
                <?php echo $form->error($model,'slide_img2_link'); ?>
            </div>

            <div class="clear"></div>
        </div>



        <div class="row">
            <?php echo $form->labelEx($model,'slide_img3'); ?>
            <div class="r-right">
                <?php echo $form->textField($model,'slide_img3',array('size'=>60,'maxlength'=>255, 'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Image url'))); ?>
                <?php echo $form->error($model,'slide_img3'); ?>
            </div>

            <div class="r-right">
                <?php echo $form->textField($model,'slide_img3_txt',array('size'=>60,'maxlength'=>255, 'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Description'))); ?>
                <?php echo $form->error($model,'slide_img3_txt'); ?>
            </div>

            <div class="r-right">
                <?php echo $form->textField($model,'slide_img3_link',array('size'=>60,'maxlength'=>255, 'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'URL'))); ?>
                <?php echo $form->error($model,'slide_img3_link'); ?>
            </div>

            <div class="clear"></div>
        </div>



        <div class="row">
            <?php echo $form->labelEx($model,'slide_img4'); ?>
            <div class="r-right">
                <?php echo $form->textField($model,'slide_img4',array('size'=>60,'maxlength'=>255, 'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Image url'))); ?>
                <?php echo $form->error($model,'slide_img4'); ?>
            </div>

            <div class="r-right">
                <?php echo $form->textField($model,'slide_img4_txt',array('size'=>60,'maxlength'=>255, 'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Description'))); ?>
                <?php echo $form->error($model,'slide_img4_txt'); ?>
            </div>

            <div class="r-right">
                <?php echo $form->textField($model,'slide_img4_link',array('size'=>60,'maxlength'=>255, 'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'URL'))); ?>
                <?php echo $form->error($model,'slide_img4_link'); ?>
            </div>

            <div class="clear"></div>
        </div>



        <div class="row">
            <?php echo $form->labelEx($model,'slide_img5'); ?>
            <div class="r-right">
                <?php echo $form->textField($model,'slide_img5',array('size'=>60,'maxlength'=>255, 'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Image url'))); ?>
                <?php echo $form->error($model,'slide_img5'); ?>
            </div>

            <div class="r-right">
                <?php echo $form->textField($model,'slide_img5_txt',array('size'=>60,'maxlength'=>255, 'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Description'))); ?>
                <?php echo $form->error($model,'slide_img5_txt'); ?>
            </div>

            <div class="r-right">
                <?php echo $form->textField($model,'slide_img5_link',array('size'=>60,'maxlength'=>255, 'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'URL'))); ?>
                <?php echo $form->error($model,'slide_img5_link'); ?>
             </div>

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