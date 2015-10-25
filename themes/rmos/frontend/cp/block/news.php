<div class="news-article-inner">
    <h3>
        <a href="<?php echo $this->createUrl('cp/article',array('id'=>$data->id));?>">
            <?php echo $data->title;?>
        </a>
    </h3>
    <div class="by-line">
        <span class="news-author"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Author').': '.$data->author;?></span>
        <span class="spacer"></span>
        <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Date').': '.News::getDate(date('d M Y -.H:i',$data->date));?>
    </div>

    <?php if($data->img !=''):?>
        <div class="article-left" style="background-image: url(<?php echo $data->img;?>);">
           <span class="thumb-frame"></span>
        </div>
    <?php endif;?>

    <div class="article-right">
        <div class="article-summary">
            <?php echo $data->s_desc;?>
            <a href="<?php echo $this->createUrl('cp/article',array('id'=>$data->id));?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Read more').' '.$data->title;?>" class="more">
                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Read more');?>
                <span class="icon-chevron-right"></span>
            </a>
        </div>
    </div>
    <div class="clear"></div>
</div>