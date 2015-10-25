<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/skin/frontend/css/rhinoslider-1.05.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/skin/frontend/css/style.css" />

    <script type="text/javascript" src="/skin/faicore/frontend/js/jquery.1.8.js"></script>
    <script type="text/javascript" src="/skin/faicore/frontend/js/rhinoslider-1.05.js"></script>
    <script type="text/javascript" src="/skin/faicore/frontend/js/mousewheel.js"></script>
    <script type="text/javascript" src="/skin/faicore/frontend/js/easing.js"></script>
    <script src="/skin/faicore/frontend/js/selectbox.js" type="text/javascript"></script>
    <script src="/skin/faicore/frontend/js/core.js" type="text/javascript"></script>

    <?php Yii::app()->clientScript->scriptMap=array(

        'jquery.js'=>false,
        'jquery.min.js'=>false,

    )?>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <script>
        jQuery(function(){
            jQuery('body').delegate('.a-nav .r-upd','click',function()
            {

                jQuery.ajax(
                    {
                        type: 'GET',
                        url:  '/projects/ru',
                        cache: false,
                        beforeSend: function()
                        {
                            jQuery("#ajax-loader").fadeIn(200);
                            jQuery('#fr-proj li').each(function(i)
                            {
                                jQuery(this).fadeOut(100).delay(i*40).fadeOut(200);
                            });
                        },
                        complete: function()
                        {
                            jQuery("#ajax-loader").fadeOut(200);
                            jQuery('#fr-proj li').each(function(i)
                            {
                                jQuery(this).fadeIn(100).delay(i*40).fadeIn(200);
                            });
                        },
                        success: function(html)
                        {
                            jQuery("#fr-proj").append().load('#main-content #fr-proj li');
                        }
                    }
                );
            });
        });
    </script>
</head>

<body>
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
                        array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Projects').'', 'url'=>array('/category/index'), 'active' => Yii::app()->controller->getId() == 'category' || Yii::app()->controller->getId() == 'pages'),
                        array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Press').'',    'url'=>array('/news/index'), 'active' => Yii::app()->controller->getId() == 'news' ),
                        array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Career').'',   'url'=>array('/career'), 'active' => Yii::app()->controller->getId() == 'career'),
                        array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Contacts').'', 'url'=>array('/main/contacts'), 'active' => Yii::app()->controller->getId() == 'main')
                    ),
                )); ?>
                </div>
            </div>

        </div>
    </div>

    <div class="t-line"></div>

    <div id="index-page">

        <?php echo $content; ?>

        <div class="clear"></div>

        <div id="footer">
            <div class="a-center">
                &copy; <?php echo date('Y'); ?> bhs.com
            </div>
        </div>

        <div class="clear-footer"></div>
    </div>


</body>
</html>
