<?php
$this->pageTitle=Yii::app()->getFConfig('serverName') .' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel').' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Tickets').' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'View ').'/ '.'#'.$model->id.' / '.$model->topic;
?>

<div class="wrapper">
    <div class="page-title">
        <h1><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Tickets').' / '.'#'.$model->id.' / '.$model->topic?></h1>
    </div>
</div>

<div class="divider"></div>

<div class="t-h-row">
    <div class="wrapper">
        <ul>
            <li><?php echo CHtml::link('<img src="'.$this->getTemplate('backend').'images/go-back.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add set of slides').'"/><span>'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Back').'</span>', '#', array('id'=>'back-btn')) ?></li>

            <?php if($model->status == 0): ?>
                <li><?php echo CHtml::link('<img src="'.$this->getTemplate('backend').'images/lock-4.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Close').'"/><span>'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Close').'</span>', array('status', 'id'=>$model->id)); ?></li>
            <?php else: ?>
                <li><?php echo CHtml::link('<img src="'.$this->getTemplate('backend').'images/unlock.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Open').'"/><span>'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Open').'</span>', array('status', 'id'=>$model->id)); ?></li>
            <?php endif;?>
        </ul>
    </div>
</div>

<div class="divider"></div>


<div class="get-space"></div>

<div class="wrapper">
    <?php
    $flashMessages = Yii::app()->user->getFlashes();
    if ($flashMessages) {
        echo '<ul class="core-messages">';
        foreach($flashMessages as $key => $message) {
            echo '<li><div class="flash-' . $key . '">
                        <p>' . $message . "</p>
                    </div></li>\n";
        }
        echo '</ul>';
    }
    ?>
</div>

<div class="wrapper">
    <div class="widget">
        <div class="title">
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/dialog.png" />
            <h6><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Dialogue')?></h6>
        </div>
            <?php $count = 1; echo $this->renderPartial('block/view',array('model'=>$model, 'count'=>$count));?>
    </div>
</div>

<div class="wrapper">
    <div class="widget">
        <div class="title">
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/edit.png" />
            <h6><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Form message')?></h6>
        </div>
             <?php echo $this->renderPartial('html/_form',array('post'=>$post));?>
    </div>
</div>