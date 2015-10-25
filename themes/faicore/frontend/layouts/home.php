<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo $this->getTemplate(); ?>css/style.css" />

    <script type="text/javascript" src="/skin<?php echo $this->getTemplate(); ?>js/jquery.1.8.js"></script>
    <script src="<?php echo $this->getTemplate(); ?>js/selectbox.js" type="text/javascript"></script>
    <script src="<?php echo $this->getTemplate(); ?>js/core.js" type="text/javascript"></script>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <script>
        jQuery(function(){
            jQuery('#language-selector').fadeIn(200);
        });
    </script>
</head>

<body>
<div id="wrapper">
        <div id="header">

                <div id="top-menu">
                    <?php $this->widget('zii.widgets.CMenu',array(
                    'items'=>array(
                        array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Home').'', 'url'=>array('/main/index')),
                        array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'News').'', 'url'=>array('/news/index'), 'active' => Yii::app()->controller->getId() == 'news' ),
                        array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Contacts').'', 'url'=>array('main/contacts'))
                    ),
                )); ?>
                </div>

                <div  id="langueages">
                    <?php $this->widget('application.components.widgets.LanguageSelector'); ?>
                </div>
            <div class="clear"></div>
        </div>

    <div id="index-page">
        <?php echo $content; ?>
    </div>

        <div id="footer">
            <div class="a-center">
                &copy; <?php echo date('Y'); ?> bhs.com
            </div>
        </div>
</div>
</body>
</html>
