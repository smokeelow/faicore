<?php

?>

<h1>View News #<?php echo $model->id; ?></h1>


    <?php echo CHtml::encode($model->id) ;?>


    <?php echo CHtml::encode($model->title); ?>

    <img src="<?php echo CHtml::encode($model->img); ?>" alt="<?php echo CHtml::encode($model->title); ?>" title="<?php echo CHtml::encode($model->title); ?>"  width="37" height="36"/>

    <?php echo $model->f_desc ?>

    <?php echo CHtml::encode($model->date); ?>

    <?php echo CHtml::link('иконка', array('update', 'id'=>$model->id)); ?>
