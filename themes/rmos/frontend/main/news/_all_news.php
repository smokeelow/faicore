<div class="news">
    <div class="news-head">
        <div class="news_icon"></div>
        <div class="newstitle">
            <h3><?php echo $data->title; ?></h3>
            <div class="newstime">
                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Wrote').': '.$data->author.' / '.News::getDate(date('d.m.Y',$data->date));?>
            </div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="n-content">
        <?php if($data->img != ''): ?>
            <img class="n-image" width="152" height="152" src="<?php echo $data->img; ?>" alt="<?php echo $data->title;?>"/>
        <?php endif;?>
            <?php echo $data->s_desc; ?>
    </div>


    <div class="n-info">
        <?php echo CHtml::link(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Read more'), array('view', 'url'=>$data->url), array('title'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'read more').' '.$data->title)); ?>
    </div>
    <div class="clear"></div>
    <div class="news-separator"></div>
</div>




