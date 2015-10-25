<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/skin/frontend/css/rhinoslider-1.05.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/skin/frontend/css/style.css" />

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <script>
        jQuery(function(){
            jQuery('#language-selector').fadeIn(200);
        });
    </script>
</head>

<body>
    <div id="header">
        <div id="head-wrap">
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
                        array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Home').'', 'url'=>array('/main/index')),
                        array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'About Us').'', 'url'=>array('/about')),
                        array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Projects').'', 'url'=>array('/category/index'), 'active' => Yii::app()->controller->getId() == 'category' ),
                        array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Press').'', 'url'=>array('/news/index'), 'active' => Yii::app()->controller->getId() == 'news' ),
                        array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Career').'', 'url'=>array('/career')),
                        array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Contacts').'', 'url'=>array('main/contacts'))
                    ),
                )); ?>
                </div>
            </div>

        </div>
    </div>

    <div id="index-page">
        <?php echo $content; ?>

        <div id="footer">
            <div class="a-center">
                &copy; <?php echo date('Y'); ?> bhs.com
            </div>
        </div>

        <div class="clear-footer"></div>
    </div>

    <script type="text/javascript" src="/skin/faicore/frontend/js/rhinoslider-1.05.js"></script>
    <script type="text/javascript" src="/skin/faicore/frontend/js/mousewheel.js"></script>
    <script type="text/javascript" src="/skin/faicore/frontend/js/easing.js"></script>
    <script src="/skin/faicore/frontend/js/selectbox.js" type="text/javascript"></script>

</body>
</html>
