<div class="wrapper">
    <div class="widget">

    <div class="title">
        <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/characters.png" />
        <h6> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Character ranking')?></h6>
    </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'top_chars'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'top_chars',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('top_chars'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter the number of characters that will appear in the ranking')
            )); ?>
                <?php echo $form->error($fconfig,'top_chars'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'showCharInfo'); ?>

            <div class="r-right">
                <?php
                echo $form->dropDownList($fconfig,'showCharInfo',
                    array(1=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enable').'', 0=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Disable').''),
                    array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select status').')',
                        'options'=>array(''.$this->getFConfig('showCharInfo').''=>array('selected'=>'selected')),
                        'class'=>'cat-select')
                );?>
                <?php echo $form->error($fconfig,'showCharInfo'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'showAccChars'); ?>

            <div class="r-right">
                <?php
                echo $form->dropDownList($fconfig,'showAccChars',
                    array(1=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Display').'', 0=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Hide').''),
                    array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select status').')',
                        'options'=>array(''.$this->getFConfig('showAccChars').''=>array('selected'=>'selected')),
                        'class'=>'cat-select')
                );?>
                <?php echo $form->error($fconfig,'showAccChars'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'showMapCoord'); ?>

            <div class="r-right">
                <?php
                echo $form->dropDownList($fconfig,'showMapCoord',
                    array(1=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Display').'', 0=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Hide').''),
                    array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select status').')',
                        'options'=>array(''.$this->getFConfig('showMapCoord').''=>array('selected'=>'selected')),
                        'class'=>'cat-select')
                );?>
                <?php echo $form->error($fconfig,'showMapCoord'); ?>
            </div>

            <div class="clear"></div>
        </div>
    </div>
</div>