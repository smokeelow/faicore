<div class="wrapper">
    <div class="widget">
        <div class="title">
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/database_connect.png" />
            <h6> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Database connection')?></h6>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'db_driver'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'db_driver',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('db_driver'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter driver type (default - mssql)')
            )); ?>
                <?php echo $form->error($fconfig,'db_driver'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'db_host'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'db_host',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('db_host'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter database server')
            )); ?>
                <?php echo $form->error($fconfig,'db_host'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'db_name'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'db_name',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('db_name'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter database name (default - MuOnline)')
            )); ?>
                <?php echo $form->error($fconfig,'db_name'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'db_user'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'db_user',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('db_user'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter username of database (default - sa)')
            )); ?>
                <?php echo $form->error($fconfig,'db_user'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'db_password'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'db_password',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('db_password'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter user password of database')
            )); ?>
                <?php echo $form->error($fconfig,'db_password'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'md5'); ?>

            <div class="r-right">
                <?php
                echo $form->dropDownList($fconfig,'md5',
                    array(1=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Activate').'', 0=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Disable').''),
                    array('empty' => '('.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select status').')',
                         'options'=>array(''.$this->getFConfig('md5').''=>array('selected'=>'selected')),
                         'class'=>'cat-select')
                );?>
                <?php echo $form->error($fconfig,'md5'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'reset_col'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'reset_col',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('reset_col'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter name of reset column')
            )); ?>
                <?php echo $form->error($fconfig,'reset_col'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'greset_col'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'greset_col',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('greset_col'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter name of Grand reset column')
            )); ?>
                <?php echo $form->error($fconfig,'greset_col'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Save') ,array('class'=>'button')); ?>
            <div class="clear"></div>
        </div>
    </div>
</div>

