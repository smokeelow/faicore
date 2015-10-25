<?php
/**
 * Common
 */
?>
<div class="wrapper">
    <div class="widget">
        <div class="title">
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/common.png" />
            <h6> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'General settings')?></h6>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'versionBit'); ?>

            <div class="r-right">
                <?php
                echo $form->dropDownList($fconfig,'versionBit',
                    array(64=>'64', 32=>'32',16=>'16'),
                    array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select value').')',
                        'options'=>array(''.$this->getFConfig('versionBit').''=>array('selected'=>'selected')),
                        'class'=>'cat-select')
                );?>
                <?php echo $form->error($fconfig,'versionBit'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'email'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'email',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('email'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter project e-mail')
            )); ?>
                <?php echo $form->error($fconfig,'email'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'mainPic'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'mainPic',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('mainPic'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter project e-mail')
            )); ?>
                <?php echo $form->error($fconfig,'mainPic'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'forumURL'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'forumURL',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('forumURL'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter link to the forum')
            )); ?>
                <?php echo $form->error($fconfig,'forumURL'); ?>
            </div>

            <div class="clear"></div>
        </div>
    </div>
</div>


<?php
/**
 * Server
 */
?>
<div class="wrapper">
    <div class="widget">
        <div class="title">
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/server_go.png" />
            <h6> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Server settings')?></h6>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'serverIP'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'serverIP',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('serverIP'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter server IP Address')
            )); ?>
                <?php echo $form->error($fconfig,'serverIP'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'serverPort'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'serverPort',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('serverPort'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter server port')
            )); ?>
                <?php echo $form->error($fconfig,'serverPort'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'serverCache'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'serverCache',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('serverCache'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter cache duration (in seconds)')
            )); ?>
                <?php echo $form->error($fconfig,'serverCache'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'serverFOnline'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'serverFOnline',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('serverFOnline'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter number of false online')
            )); ?>
                <?php echo $form->error($fconfig,'serverFOnline'); ?>
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



