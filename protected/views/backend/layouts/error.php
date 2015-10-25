<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/skin/core/css/style.css" />

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>

<body>

<div id="index-page">
    <?php echo $content; ?>
</div>

</body>
</html>
