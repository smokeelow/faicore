<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="<?php echo $this->getTemplate('core');?>css/tooltipster.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->getTemplate('core');?>css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $this->getTemplate();?>css/style.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="<?php echo $this->getTemplate('core');?>images/favicon.ico"/>

    <script type="text/javascript" src="<?php echo $this->getTemplate('core');?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo $this->getTemplate('core');?>js/jquery.tooltipster.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->getTemplate('core');?>js/core.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->getTemplate('core');?>js/auth.js"></script>

    <?php Yii::app()->clientScript->scriptMap=array(

        'jquery.js'=>false,
        'jquery.min.js'=>false,

    )?>

    <title><?php echo $this->pageTitle; ?></title>
</head>
<body class="<?php echo Yii::app()->controller->id.'-'.Yii::app()->controller->action->id;?>">
    <div id="header">
        <?php echo $this->renderPartial('../layouts/html/menu');?>
        
        <div class="start">
            <a id="start-game" href="<?php echo $this->createUrl('registration/index');?>"></a>
        </div>

        <div class="clear"></div>
    </div>

    <div id="wrapper">
        <div id="main-view"> </div>
            <div id="blocks-wrapper">

                <div id="left-block">
                    <div id="faicore-ajax" data-url="<?php echo $this->createUrl('main/ajax',array('id'=>'sidebar'));?>">

                    </div>
                </div>

                <div id="content">
                    <?php echo $content;?>
                </div>
                <div class="clear"></div>
        </div>

        <div id="footer">
            <div class="footer-wrapper">
                <div class="soc-buttons">
                    <a href="#" class="facebook"></a>
                    <a href="#" class="vk"></a>
                    <a href="#" class="twitter"></a>
                    <a href="#" class="mailru"></a>
                    <a href="#" class="des-by-napam"></a>
                </div>
            </div>
            <div class="banners">

            </div>
        </div>
    </div>
    <?php echo $this->renderPartial('../layouts/html/modal');?>
</body>
</html>