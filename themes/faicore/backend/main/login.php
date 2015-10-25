<?php
$this->pageTitle=Yii::app()->getFConfig('serverName') . ' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel').' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Authorization').'';
?>

<div id="login-wrapper">
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
    <div id="login-block">
        <div id="login-header">
            <div class="l-title">
                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Authorization panel')?>
            </div>
            <?php
            $this->widget('application.components.backend.widgets.ServerSelector');
            ?>
            <div class="l-lang">
                <?php


                    $this->widget('application.components.backend.widgets.LanguageSelector');
                ?>
            </div>

            <div class="clear"></div>
        </div>
        <div id="login-f">
                <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'login-form',
                'enableAjaxValidation'=>true,
            )); ?>

                <div class="row">
                    <?php echo $form->textField($model,'usr', array('placeholder'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Login').'')); ?>
                    <?php echo $form->error($model,'usr'); ?>
                </div>

                <div class="line">
                    <?php echo $form->passwordField($model,'pwd', array('placeholder'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Password').'')); ?>
                    <?php echo $form->error($model,'pwd'); ?>
                </div>


                <div class="submit">
                    <?php echo CHtml::submitButton(''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Sign in').''); ?>
                </div>

                <?php $this->endWidget(); ?>
        </div>
    </div>
    <div class="b-links">
       <div><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Developed by'); ?> <a target="_blank" href="http://faicore.com/">faicore.com</a></div>
    </div>
</div>