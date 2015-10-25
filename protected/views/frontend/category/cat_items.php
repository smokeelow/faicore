<?php if(sizeof($model->pages) > 0): ?>
<?php foreach($model->pages as $item): ?>
<div class="project-item">
    <img class="c-image" src="<?php echo $item->img;?>" width="142" height="82" alt="<?php echo  $item->title;?>" title="<?php echo $item->title;?>"/>

    <div class="p-title"><?php echo $item->title;?>: </div> <?php echo $item->s_desc ?>



    <div class="read-more-link">
        <a href="/projects/<?php echo Yii::app()->request->cookies['language']->value.'/'.$model->url.'/'.$item->url ?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'more info').' '.$item->title ?>"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'more info') ?></a>
    </div>

    <div class="clear"></div>
</div>

<?php endforeach;?>
<?php else: ?>
    Список проектов пуст:)
<?php endif;?>



