<?php
$this->pageTitle=Yii::app()->name . ' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'News') . ' / '. $model->title;
?>

<div class="news-full">
    <div class="page-title">
        <h1><?php echo $model->title; ?></h1>
    </div>

    <div clas="news-full-content">
        <?php echo $model->f_desc; ?>
    </div>
</div>

