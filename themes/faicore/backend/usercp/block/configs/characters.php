<div class="wrapper">
    <div class="widget">
        <div class="title">
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/u-g.png" />
            <h6> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Characters menu')?></h6>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'teleportationMItem'); ?>

            <div class="r-right">
                <?php
                echo $form->dropDownList($fconfig,'teleportationMItem',
                    array(1=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enable').'', 0=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Disable').''),
                    array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select status').')',
                        'options'=>array(''.$this->getFConfig('teleportationMItem').''=>array('selected'=>'selected')),
                        'class'=>'cat-select')
                );?>
                <?php echo $form->error($fconfig,'teleportationMItem'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'resetMItem'); ?>

            <div class="r-right">
                <?php
                echo $form->dropDownList($fconfig,'resetMItem',
                    array(1=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enable').'', 0=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Disable').''),
                    array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select status').')',
                        'options'=>array(''.$this->getFConfig('resetMItem').''=>array('selected'=>'selected')),
                        'class'=>'cat-select')
                );?>
                <?php echo $form->error($fconfig,'resetMItem'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'pointsMItem'); ?>

            <div class="r-right">
                <?php
                echo $form->dropDownList($fconfig,'pointsMItem',
                    array(1=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enable').'', 0=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Disable').''),
                    array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select status').')',
                        'options'=>array(''.$this->getFConfig('pointsMItem').''=>array('selected'=>'selected')),
                        'class'=>'cat-select')
                );?>
                <?php echo $form->error($fconfig,'pointsMItem'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Save') ,array('class'=>'button')); ?>
            <div class="clear"></div>
        </div>
    </div>
</div>
