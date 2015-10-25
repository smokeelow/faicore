<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'contact-form',
    'enableAjaxValidation'=>true,
)); ?>


    <div class="row">
        <?php echo $form->labelEx($model,'name'); ?>
        <div class="r-right">
            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'name'); ?>
        </div>

        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'email'); ?>

        <div class="r-right">
            <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'email'); ?>
        </div>

        <div class="clear"></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'phone'); ?>

        <div class="r-right">
            <?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'phone'); ?>
        </div>

        <div class="clear"></div>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model,'subject'); ?>

        <div class="r-right">
            <?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'subject'); ?>
        </div>

        <div class="clear"></div>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model,'text'); ?>

        <div class="r-right">
            <?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'text'); ?>
        </div>

        <div class="clear"></div>
    </div>



    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Send') ,array('class'=>'send-btn')); ?>
        <div class="clear"></div>
    </div>


    <?php $this->endWidget(); ?>

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