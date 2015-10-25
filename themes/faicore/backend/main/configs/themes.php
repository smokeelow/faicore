<div class="wrapper">
    <div class="widget">

    <div class="title">
        <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/themes_1.png" />
        <h6> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Theme settings')?></h6>
    </div>

    <div class="row">
        <?php echo $form->labelEx($fconfig,'f_theme'); ?>

        <div class="r-right">
            <?php echo $form->dropDownList($fconfig,'f_theme',
                $fconfig->getFTempalte('frontend'),
                array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select theme').')',
                    'options'=>array(''.$this->getFConfig('f_theme').''=>array('selected'=>'selected')),
                    'class'=>'cat-select')
            );?>
            <?php echo $form->error($fconfig,'f_theme'); ?>
        </div>

        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($fconfig,'b_theme'); ?>

        <div class="r-right">
            <?php echo $form->dropDownList($fconfig,'b_theme',
                $fconfig->getFTempalte('backend'),
                array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select theme').')',
                    'options'=>array(''.$this->getFConfig('b_theme').''=>array('selected'=>'selected')),
                    'class'=>'cat-select')
            );?>
            <?php echo $form->error($fconfig,'b_theme'); ?>
        </div>

        <div class="clear"></div>
    </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Save') ,array('class'=>'button')); ?>
            <div class="clear"></div>
        </div>
    </div>
</div>
