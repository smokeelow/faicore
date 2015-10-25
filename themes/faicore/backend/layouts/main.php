<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" type="text/css" href="<?php echo $this->getTemplate('backend'); ?>css/style.css" />
    <link rel="shortcut icon" href="<?php echo $this->getTemplate('core');?>images/favicon.ico"/>

    <script src="<?php echo $this->getTemplate('backend'); ?>js/jquery.1.9.js"></script>

    <script src="<?php echo $this->getTemplate('backend'); ?>js/selectbox.js"></script>
    <script src="<?php echo $this->getTemplate('backend'); ?>js/core.js"></script>

   <?php Yii::app()->clientScript->scriptMap=array(

        'jquery.js'=>false,

    )?>
	<title><?php echo $this->pageTitle; ?></title>


</head>

<body>
<div id="main-s-wrapper">
<div id="left-side">
    <div id="sidebar">
        <div id="c-logo">
            <div id="go-to-wsite">
                <a class="sButton sBlue" target="_blank" href="<?php echo $this->getFConfig('webURL');?>">
                    <img src="<?php echo $this->getTemplate('backend');?>images/globe.png" alt="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Go to web site')?>" />
                    <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Go to web site')?></span>
                </a>
            </div>
        </div>


        <div class="sep-line"></div>
            <?php
                $this->widget('application.components.backend.widgets.LanguageSelector');
            ?>
        <div class="sep-line"></div>
            <?php echo $this->renderPartial('../layouts/html/menu');?>
        <div class="sep-line"></div>
            <?php echo $this->renderPartial('../layouts/html/statistics');?>
        <div class="sep-line"></div>
    </div>
</div>

<div id="right-side">
    <div id="header">

        <div id="u-holder">
            <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Welcome')?>, <?php echo Yii::app()->user->rname;?> !</span>
            <!--        <img width="72" src="--><?php //echo Yii::app()->user->picture ?><!--" alt="--><?php //echo Yii::app()->user->name;?><!--" title="--><?php //echo Yii::app()->user->name;?><!--"/>-->

        </div>

        <div id="h-user">
            <ul>
                <li>

                </li>
                <li>
                    <?php
                    echo CHtml::link('
                            <img src="'.$this->getTemplate('backend').'images/profile.png" alt="Logout"/>
                            <span class="t-l-item">'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Profile').'</span>
                            ', $this->createUrl('staff/edit', array('alias'=>Yii::app()->user->username))
                    );
                    ?>
                </li>
                <li>
                    <?php
                    echo CHtml::link('
                            <img src="'.$this->getTemplate('backend').'images/logout.png" alt="Logout"/>
                            <span class="t-l-item">'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Logout').'</span>
                            ', $this->createUrl('main/logout')
                    );
                    ?>
                </li>
            </ul>
        </div>
    </div>

    <div id="m-r-content">
        <?php echo $content; ?>
    </div>
</div>
</div>
    <script src="<?php echo $this->getTemplate('backend');?>js/jquery.ui.1.10.js"></script>
    <?php echo $this->renderPartial('../layouts/html/modal');?>
</body>
</html>
