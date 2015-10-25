<div class="wrapper">
    <div class="widget">

        <div class="title">
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/arrow_circle_double.png" />
            <h6> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset settings')?></h6>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'resetLevel'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'resetLevel',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('resetLevel'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter level for reset')
            )); ?>
                <?php echo $form->error($fconfig,'resetLevel'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'maxPoints'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'maxPoints',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('maxPoints'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter maximum number of points')
            )); ?>
                <?php echo $form->error($fconfig,'maxPoints'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'resetDwPoints'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'resetDwPoints',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('resetDwPoints'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter points number')
            )); ?>
                <?php echo $form->error($fconfig,'resetDwPoints'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'resetDkPoints'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'resetDkPoints',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('resetDkPoints'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter points number')
            )); ?>
                <?php echo $form->error($fconfig,'resetDkPoints'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'resetElfPoints'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'resetElfPoints',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('resetElfPoints'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter points number')
            )); ?>
                <?php echo $form->error($fconfig,'resetElfPoints'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'resetMgPoints'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'resetMgPoints',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('resetMgPoints'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter points number')
            )); ?>
                <?php echo $form->error($fconfig,'resetMgPoints'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'resetDlPoints'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'resetDlPoints',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('resetDlPoints'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter points number')
            )); ?>
                <?php echo $form->error($fconfig,'resetDlPoints'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'resetSumPoints'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'resetSumPoints',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('resetSumPoints'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter points number')
            )); ?>
                <?php echo $form->error($fconfig,'resetSumPoints'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'resetRfPoints'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'resetRfPoints',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('resetRfPoints'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter points number')
            )); ?>
                <?php echo $form->error($fconfig,'resetRfPoints'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'resetInvType'); ?>

            <div class="r-right">
                <?php
                echo $form->dropDownList($fconfig,'resetInvType',
                    array(1=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Yes').'', 0=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'No').''),
                    array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Clean inventory').')',
                        'options'=>array(''.$this->getFConfig('resetInvType').''=>array('selected'=>'selected')),
                        'class'=>'cat-select')
                );?>
                <?php echo $form->error($fconfig,'resetInvType'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'resetMlType'); ?>

            <div class="r-right">
                <?php
                echo $form->dropDownList($fconfig,'resetMlType',
                    array(1=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Yes').'', 0=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'No').''),
                    array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Clean magic list').')',
                        'options'=>array(''.$this->getFConfig('resetMlType').''=>array('selected'=>'selected')),
                        'class'=>'cat-select')
                );?>
                <?php echo $form->error($fconfig,'resetMlType'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'resetPtType'); ?>

            <div class="r-right">
                <?php
                echo $form->dropDownList($fconfig,'resetPtType',
                    array(1=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Yes').'', 0=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'No').''),
                    array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset points').')',
                        'options'=>array(''.$this->getFConfig('resetPtType').''=>array('selected'=>'selected')),
                        'class'=>'cat-select')
                );?>
                <?php echo $form->error($fconfig,'resetMlType'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Save') ,array('class'=>'button')); ?>
            <div class="clear"></div>
        </div>
    </div>
</div>



