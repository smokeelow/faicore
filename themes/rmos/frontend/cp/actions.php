<?php foreach ($model->getOCChar() as $item):?>
<div id="non-cblock" class="char-block <?php echo $model->getCChar($item->Name);?>">
    <div class="r-side">
        <?php echo $this->renderPartial('block/'.Yii::app()->controller->action->id.'',array('char'=>$item, 'model'=>$model));?>
    </div>

    <?php echo $this->renderPartial('html/sideInfo',array('item'=>$item,'model'=>$model));?>
    <div class="clear"></div>
</div>
<?php endforeach;?>