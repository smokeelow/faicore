<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" type="text/css" href="<?php echo $this->getTemplate('backend'); ?>css/style.css" />
    <link rel="shortcut icon" href="<?php echo $this->getTemplate('core');?>images/favicon.ico"/>

    <script src="<?php echo $this->getTemplate('backend'); ?>js/jquery.1.8.js"></script>
    <script src="<?php echo $this->getTemplate('backend'); ?>js/selectbox.js"></script>
    <script src="<?php echo $this->getTemplate('backend'); ?>js/auth.js"></script>
    <?php Yii::app()->clientScript->scriptMap=array(

    'jquery.js'=>false,

    )?>
    <style>
        html{height: auto;}
    </style>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body class="login-page">
    <?php echo $content; ?>
</body>
</html>
