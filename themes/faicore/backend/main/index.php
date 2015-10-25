<div class="wrapper">
    <div class="page-title">
        <h1><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Settings'). ' / ' . Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'General')  ?></h1>
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
<?php
    $form=$this->beginWidget('CActiveForm', array(
        'id'=>'config-form',
        'enableAjaxValidation'=>true,
    ));
    echo $this->renderPartial('configs/'.Yii::app()->controller->action->id.'', array('fconfig'=>$fconfig, 'form'=>$form));
    $this->endWidget();
?>
</div>


