<?php if(sizeof($model->slides) > 0): ?>
    <?php echo $this->renderPartial('slider', array('model'=>$model)); ?>
<?php endif; ?>

<div class="pdp-content">
    <?php echo $model->f_desc ?>
</div>
