<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/skin/backend/css/style.css" />
    <script src="/skin/backend/faicore/js/jquery.1.8.js"></script>
    <script src="/skin/backend/faicore/js/selectbox.js"></script>
    <script src="/skin/backend/faicore/js/auth.js"></script>
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
