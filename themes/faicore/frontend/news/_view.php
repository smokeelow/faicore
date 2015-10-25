<div id="news-<?php echo Pages::getTranslit($data->title)?>" class="news-item">

    <div class="news-title">
        <div class="date">
            <?php foreach($this->getDate($data->date) as $item): ?>
                <div><?php echo $item; ?></div>
            <?php endforeach; ?>
        </div>

        <h1 class="title">
            <?php echo CHtml::encode($data->title); ?>
        </h1>

        <div class="clear"></div>
    </div>

    <div  class="news-content">
        <div class="news-img">
            <img width="200" height="130" src="<?php echo CHtml::encode($data->img); ?>" alt="<?php echo $data->title;?>"/>
        </div>



        <div class="news-sdesc">
            <?php echo $data->s_desc ?>

            <div class="rmore-link">
                <?php echo CHtml::link(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Read more'), array("view", "url"=>$data->url), array("title"=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'read more')." ".$data->title)); ?>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
