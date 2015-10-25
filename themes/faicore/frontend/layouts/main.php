<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo $this->getTemplate(); ?>css/style.css" />

    <script type="text/javascript" src="/skin<?php echo $this->getTemplate(); ?>js/jquery.1.8.js"></script>
    <script src="<?php echo $this->getTemplate(); ?>js/selectbox.js" type="text/javascript"></script>
    <script src="<?php echo $this->getTemplate(); ?>js/core.js" type="text/javascript"></script>

    <?php Yii::app()->clientScript->scriptMap=array(

        'jquery.js'=>false,
        'jquery.min.js'=>false,

    )?>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>

<body>
<div id="wrapper">
    <div id="header">
        <div id="header-wrap">
            <div id="logo"><img src="/skin/faicore/frontend/images/logo.png" alt="Web Gragion Logo" title="<?php echo Yii::app()->name;?>"/></div>

            <div class="h-control">
                <div  id="language-selector">
                    <?php
                    $this->widget('application.components.widgets.LanguageSelector');
                    ?>
                </div>

                <div id="top-menu">
                    <?php $this->widget('zii.widgets.CMenu',array(
                    'items'=>array(
                        array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Home').'',     'url'=>array('/main/index')),
                        array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'About Us').'', 'url'=>array('/about'), 'active' => Yii::app()->controller->getId() == 'about'),
                        array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'News').'',    'url'=>array('/news/index'), 'active' => Yii::app()->controller->getId() == 'news' ),
                        array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Contacts').'', 'url'=>array('/main/contacts'), 'active' => Yii::app()->controller->getId() == 'main')
                    ),
                )); ?>
                </div>
            </div>

        </div>
    </div>

    <div id="index-page">

        <?php echo $content; ?>

        <div class="clear"></div>

        <div id="footer">
            <div class="a-center">
                &copy; <?php echo date('Y'); ?> faicore.com
            </div>
        </div>
    </div>

</div>

</body>
</html>
