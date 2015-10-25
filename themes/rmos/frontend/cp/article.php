<div class="news-article-inner">
    <h3>
        <a href="<?php echo $this->createUrl('cp/article',array('id'=>$model->id));?>">
            <?php echo $model->title;?>
        </a>
    </h3>
    <div class="by-line">
        <span class="news-author"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Author').': '.$model->author;?></span>
        <span class="spacer"></span>
        <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Date').': '.News::getDate(date('d M Y -.H:i',$model->date));?>
    </div>

    <div class="article-right">
        <div class="article-summary">
            <?php echo $model->description;?>
        </div>
    </div>
    <span class="clear"></span>
</div>