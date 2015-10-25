<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="<?php echo $this->getTemplate('core');?>css/tooltipster.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->getTemplate('core');?>css/style.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="<?php echo $this->getTemplate('core');?>images/favicon.ico"/>

    <script type="text/javascript" src="<?php echo $this->getTemplate('core');?>js/jquery.js"></script>

    <script type="text/javascript" src="<?php echo $this->getTemplate('core');?>js/jquery.tooltipster.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->getTemplate('core');?>js/jquery.form.js"></script>
    <script type="text/javascript" src="<?php echo $this->getTemplate('core');?>js/core.js"></script>

    <?php Yii::app()->clientScript->scriptMap=array(
        'jquery.js'=>false,
        'jquery.min.js'=>false,
    )?>

    <title><?php echo $this->pageTitle; ?></title>
</head>
<body class="cp-page <?php echo Yii::app()->controller->id.'-'.Yii::app()->controller->action->id;?>">
    <div id="cp-wrapper">
        <div id="head-line">
            <?php echo $this->renderPartial('../cp/html/topMenu');?>
            <?php echo $this->renderPartial('../layouts/html/globalAjax');?>
        </div>

        <div class="cp-content">
            <div class="cp-shadow-bg">
                <div id="cp-menu">
                    <div class="category">
                        <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Menu');?>
                        <span class="icon-menu"></span>
                    </div>
                    <?php echo $this->renderPartial('../cp/html/menu');?>
                </div>
                <div id="cp-content">
                    <?php echo $content;?>
                </div>
                <div id="confirm-up-bl"></div>
                <div class="clear"></div>
            </div>
            <div id="footer">

            </div>
        </div>
    </div>
    <?php echo $this->renderPartial('../layouts/html/modal');?>
</body>
</html>