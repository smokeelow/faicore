<div class="wrapper">
    <div class="widget">

    <div class="title">
        <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/edit-clear.png" />
        <h6> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'PK Clear')?></h6>
    </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'pk_status'); ?>

            <div class="r-right">
                <?php
                echo $form->dropDownList($fconfig,'pk_status',
                    array(1=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Dynamic').'', 0=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Fixed').''),
                    array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select payment type').')',
                        'options'=>array(''.$this->getFConfig('pk_status').''=>array('selected'=>'selected')),
                        'class'=>'cat-select')
                );?>
                <?php echo $form->error($fconfig,'pk_status'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'pk_price'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'pk_price',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('pk_price'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter price for dynamic type')
            )); ?>
                <?php echo $form->error($fconfig,'pk_price'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'pk_priceFix'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'pk_priceFix',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('pk_priceFix'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter price for fixed type')
            )); ?>
                <?php echo $form->error($fconfig,'pk_priceFix'); ?>
            </div>

            <div class="clear"></div>
        </div>
    </div>
</div>

<?php
/**
 * Teleportation
 */
?>
<div class="wrapper">
    <div class="widget">

        <div class="title">
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/wizard.png" />
            <h6> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Teleportation')?></h6>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'tp_status'); ?>

            <div class="r-right">
                <?php
                echo $form->dropDownList($fconfig,'tp_status',
                    array(1=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Dynamic').'', 0=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Fixed').''),
                    array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select payment type').')',
                        'options'=>array(''.$this->getFConfig('tp_status').''=>array('selected'=>'selected')),
                        'class'=>'cat-select')
                );?>
                <?php echo $form->error($fconfig,'tp_status'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'tp_price'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'tp_price',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('tp_price'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter price for dynamic type')
            )); ?>
                <?php echo $form->error($fconfig,'tp_price'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'tp_priceFix'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'tp_priceFix',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('tp_priceFix'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter price for fixed type')
            )); ?>
                <?php echo $form->error($fconfig,'tp_priceFix'); ?>
            </div>

            <div class="clear"></div>
        </div>
    </div>
</div>



<?php
/**
 * Reset
 */
?>
<div class="wrapper">
    <div class="widget">

        <div class="title">
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/arrow_circle_double.png" />
            <h6> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset')?></h6>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'resetPayType'); ?>

            <div class="r-right">
                <?php
                echo $form->dropDownList($fconfig,'resetPayType',
                    array(1=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Dynamic').'', 0=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Fixed').''),
                    array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select payment type').')',
                        'options'=>array(''.$this->getFConfig('resetPayType').''=>array('selected'=>'selected')),
                        'class'=>'cat-select')
                );?>
                <?php echo $form->error($fconfig,'resetPayType'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'resetPayDynamic'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'resetPayDynamic',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('resetPayDynamic'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter price for dynamic type')
            )); ?>
                <?php echo $form->error($fconfig,'resetPayDynamic'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'resetPayFixed'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'resetPayFixed',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('resetPayFixed'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter price for fixed type')
            )); ?>
                <?php echo $form->error($fconfig,'resetPayFixed'); ?>
            </div>

            <div class="clear"></div>
        </div>
    </div>
</div>

    <div class="wrapper">
        <div class="widget">
<div class="row buttons">
    <?php echo CHtml::submitButton(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Save') ,array('class'=>'button')); ?>
    <div class="clear"></div>
</div>
</div>
        </div>


