<?php
$this->pageTitle=Yii::app()->name . ' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Projects').' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Projects list').'';
?>

<?php
    $lastProjects = Pages::getRandProjects();
    echo $this->renderPartial('l_projects', array('model'=>$lastProjects));
?>

<div class="sidebar">
    <?php $items = Category::model()->getMenuItemsRecursive();
    if(sizeof($items) > 0): ?>
        <div class="title">
            <h2><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Categories')?></h2>
        </div>

        <?php
        $this->widget('zii.widgets.CMenu',array(
            'items'=> $items,
        ));
        ?>
    <?php endif; ?>


    <?php $done = Category::model()->getMenuDone();
    if(sizeof($done) > 0):?>
        <div class="title">
            <h2><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Completed projects')?></h2>
        </div>
        <?php
        $this->widget('zii.widgets.CMenu',array(
            'items'=> $done,
        ));
        ?>
    <?php endif; ?>
</div>


   <div class="content">
       <div class="page-title">
           <h1><?php echo $model->name; ?></h1>
       </div>

        <?php echo $this->renderPartial('cat_all_items', array('pages'=>$pages)); ?>

   </div>

<div class="clear"></div>