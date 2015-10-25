<?php
    $this->pageTitle=$this->getFConfig('serverName') .' / '.
        Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel').' / '.
        Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Home'). ' / '.
        Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Settings'). ' / ' .
        Yii::t(''.Yii::app()->request->cookies['language']->value.'', Yii::app()->controller->action->id == "seo" || Yii::app()->controller->action->id == "mmotop" || Yii::app()->controller->action->id == "ipb" ? strtoupper(Yii::app()->controller->action->id) : ucfirst(Yii::app()->controller->action->id));
?>

<div class="wrapper">
    <div class="page-title">
        <h1><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Settings').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', Yii::app()->controller->action->id == "seo" || Yii::app()->controller->action->id == "mmotop" || Yii::app()->controller->action->id == "ipb" ? strtoupper(Yii::app()->controller->action->id) : ucfirst(Yii::app()->controller->action->id)) ?></h1>
    </div>
</div>

<div class="divider"></div>


<div class="t-h-row">
    <div class="wrapper">
        <?php echo $this->renderPartial('html/menu');?>
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

<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'config-form',
        'enableAjaxValidation'=>true,
    )); ?>



    <?php echo $this->renderPartial('configs/'.Yii::app()->controller->action->id.'', array('fconfig'=>$fconfig, 'form'=>$form)); ?>


<?php $this->endWidget(); ?>
</div>
