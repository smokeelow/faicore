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
  <div id="login-wrapper">
      <div class="login-top-bg"></div>
      <div class="login-middle-bg">
        <?php echo $content;?>
      </div>
      <div class="login-bottom-bg"></div>
  </div>
</body>
</html>