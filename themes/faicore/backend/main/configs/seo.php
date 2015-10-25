<div class="wrapper">
    <div class="widget">
        <div class="title">
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/go-home.png" />
            <h6> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Home page')?></h6>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'webURL'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'webURL',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('webURL'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter base web site url (for example - http://mysite.com)')
            )); ?>
                <?php echo $form->error($fconfig,'webURL'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'serverName'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'serverName',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('serverName'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter server name')
            )); ?>
                <?php echo $form->error($fconfig,'serverName'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'serverCredits'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'serverCredits',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('serverCredits'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter server credits')
            )); ?>
                <?php echo $form->error($fconfig,'serverCredits'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'siteTitle'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'siteTitle',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('siteTitle'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter site title')
            )); ?>
                <?php echo $form->error($fconfig,'siteTitle'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'metaDesc'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'metaDesc',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('metaDesc'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter meta description')
            )); ?>
                <?php echo $form->error($fconfig,'metaDesc'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'metaKey'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'metaKey',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('metaKey'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter meta keywords')
            )); ?>
                <?php echo $form->error($fconfig,'metaKey'); ?>
            </div>

            <div class="clear"></div>
        </div>
    </div>
</div>

<div class="wrapper">
    <div class="widget">
        <?php
        /**
         * Registration page
         */
        ?>
        <div class="title">
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/contact-new.png" />
            <h6> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Registration page')?></h6>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'regTitle'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'regTitle',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('regTitle'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter site title')
            )); ?>
                <?php echo $form->error($fconfig,'regTitle'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'metaDescReg'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'metaDescReg',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('metaDescReg'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter meta description')
            )); ?>
                <?php echo $form->error($fconfig,'metaDescReg'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'metaKeyReg'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'metaKeyReg',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('metaKeyReg'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter meta keywords')
            )); ?>
                <?php echo $form->error($fconfig,'metaKeyReg'); ?>
            </div>

            <div class="clear"></div>
        </div>
    </div>
</div>

<div class="wrapper">
    <div class="widget">
        <?php
        /**
         * Login page
         */
        ?>
        <div class="title">
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/login_.png" />
            <h6> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Login page')?></h6>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'logTitle'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'logTitle',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('logTitle'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter site title')
            )); ?>
                <?php echo $form->error($fconfig,'logTitle'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'metaDescLog'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'metaDescLog',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('metaDescLog'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter meta description')
            )); ?>
                <?php echo $form->error($fconfig,'metaDescLog'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'metaKeyLog'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'metaKeyLog',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('metaKeyLog'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter meta keywords')
            )); ?>
                <?php echo $form->error($fconfig,'metaKeyLog'); ?>
            </div>

            <div class="clear"></div>
        </div>
    </div>
</div>

<div class="wrapper">
    <div class="widget">
        <?php
        /**
         * Download page
         */
        ?>
        <div class="title">
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/application-x-kgetlist.png" />
            <h6> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Download page')?></h6>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'downTitle'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'downTitle',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('downTitle'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter site title')
            )); ?>
                <?php echo $form->error($fconfig,'downTitle'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'metaDescDown'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'metaDescDown',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('metaDescDown'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter meta description')
            )); ?>
                <?php echo $form->error($fconfig,'metaDescDown'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'metaKeyDown'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'metaKeyDown',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('metaKeyDown'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter meta keywords')
            )); ?>
                <?php echo $form->error($fconfig,'metaKeyDown'); ?>
            </div>

            <div class="clear"></div>
        </div>
    </div>
</div>


<div class="wrapper">
    <div class="widget">
        <?php
        /**
         * Character ranking
         */
        ?>
        <div class="title">
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/user-red.png" />
            <h6> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Character ranking')?></h6>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'chaRTitle'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'chaRTitle',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('chaRTitle'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter site title')
            )); ?>
                <?php echo $form->error($fconfig,'chaRTitle'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'metaDescChar'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'metaDescChar',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('metaDescChar'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter meta description')
            )); ?>
                <?php echo $form->error($fconfig,'metaDescChar'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'metaKeyChar'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'metaKeyChar',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('metaKeyChar'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter meta keywords')
            )); ?>
                <?php echo $form->error($fconfig,'metaKeyChar'); ?>
            </div>

            <div class="clear"></div>
        </div>
    </div>
</div>

<div class="wrapper">
    <div class="widget">
        <?php
        /**
         * Guild ranking
         */
        ?>
        <div class="title">
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/guilds.png" />
            <h6> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Guild ranking')?></h6>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'gulRTitle'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'gulRTitle',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('gulRTitle'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter site title')
            )); ?>
                <?php echo $form->error($fconfig,'gulRTitle'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'metaDescGuild'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'metaDescGuild',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('metaDescGuild'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter meta description')
            )); ?>
                <?php echo $form->error($fconfig,'metaDescGuild'); ?>
            </div>

            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($fconfig,'metaKeyGuild'); ?>

            <div class="r-right">
                <?php echo $form->textField($fconfig,'metaKeyGuild',array(
                'size'=>60,'maxlength'=>255,
                'value'=>$this->getFConfig('metaKeyGuild'),
                'placeholder'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter meta keywords')
            )); ?>
                <?php echo $form->error($fconfig,'metaKeyGuild'); ?>
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