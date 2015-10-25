<?php if($this->beginCache('serversInfo' , array(
    'varyByExpression'=>Yii::app()->request->cookies['language']->value.Yii::app()->request->cookies['server']->value.$model->Name,
    'duration'=>300,
    'varyByRoute' => false))) { ?>

<link href="<?php echo $this->getTemplate('core');?>css/slider.css" type="text/css" rel="stylesheet"/>
<script src="<?php echo $this->getTemplate('core');?>js/jquery.over.js" type="text/javascript"></script>
<script src="<?php echo $this->getTemplate('core');?>js/jquery.nanoslider.js" type="text/javascript"></script>
<script src="<?php echo $this->getTemplate('core');?>js/jquery.scrollTo.js" type="text/javascript"></script>

<script type="text/javascript">
    jQuery('.item').tooltipster({
        animation: 'fade',
        arrow: false,
        arrowColor: '',
        delay: 0,
        fixedWidth: 0,
        followMouse: false,
        offsetX: 0,
        offsetY: 0,
        overrideText: '',
        position: 'right',
        speed: 100
    })

    jQuery('.nano').nanoScroller({
        preventPageScrolling: true
    });
</script>


<div class="char-page" style="background-image:url(/images/items/inventory/<?php echo Character::getCClass($model->Class,3);?>.jpg);">
    <div class="inv-bg">
        <div class="char-name">
            <div class="name">
                <?php echo $model->Name;?>
            </div>
        </div>
        <?php echo $this->renderPartial('block/inventory',array('item'=>$item,'itemDesc'=>$itemDesc));?>
    </div>

    <?php echo $this->renderPartial('block/infoBlock',array('model'=>$model,'chars'=>$chars));?>
    <div class="clear"></div>
</div>

<?php $this->endCache(); } ?>




