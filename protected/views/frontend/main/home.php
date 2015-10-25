<?php
    $this->pageTitle=Yii::app()->name;
?>

<?php echo $this->renderPartial('slides', array('model'=>$model)); ?>

    <div class="home-projects">
        <?php foreach($project as $item): ?>
              <div class="hp-item">
                  <div class="hp-title"><?php echo $item->title;?></div>
                  <div class="hp-img"><img width="230" height="150" src="<?php echo $item->img; ?>" alt="<?php echo $item->title;?>" title="<?php echo $item->title;?>"/></div>
                  <div class="hp-desc"><?php echo $item->s_desc;?></div>
                  <div class="hp-link"><a href="<?php echo $item->url;?>"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'more info'); ?></a></div>
              </div>
        <?php endforeach; ?>
    </div>


<div class="clear"></div>