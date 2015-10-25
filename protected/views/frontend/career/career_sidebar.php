<?php
$this->pageTitle=Yii::app()->name . ' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Career').'';
?>


<div class="sidebar about">
        <div class="title">
            <h2><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Categories')?></h2>
        </div>

    <?php  $items = Career::model()->getMenu();
        $this->widget('zii.widgets.CMenu',array(
            'items'=> $items,
            'submenuHtmlOptions'=>array('id'=>'subnav', ),
        ));
    ?>

</div>


   <div class="content">
       <div class="page-title">
           <h1><?php echo $model->title; ?></h1>
       </div>

        <?php echo $this->renderPartial('career_view', array('model'=>$model)); ?>

   </div>

<div class="clear"></div>