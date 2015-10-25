<div class="wrapper">
    <div class="page-title">
        <h1><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Rankings');?></h1>
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

    <?php echo $this->renderPartial('block/characters', array('fconfig'=>$fconfig, 'form'=>$form)); ?>
    <?php echo $this->renderPartial('block/save', array('fconfig'=>$fconfig, 'form'=>$form)); ?>
    <?php $this->endWidget(); ?>
</div>


