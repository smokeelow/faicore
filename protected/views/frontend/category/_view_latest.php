<?php foreach($data->category as $item): ?>
<div class="project-item">
    <img class="c-image" src="<?php echo $data->img;?>" width="142" height="82" alt="<?php echo  $data->title;?>" title="<?php echo $data->title;?>"/>

    <div class="p-title"><?php echo $data->title;?>: </div> <?php echo $data->s_desc ?>

    <div class="read-more-link">
        <a href="/projects/<?php echo Yii::app()->request->cookies['language']->value.'/'.$item->url.'/'.$data->alias ?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'more info').' '.$data->title ?>"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'more info') ?></a>
    </div>

    <div class="clear"></div>
</div>
<?php endforeach;?>



