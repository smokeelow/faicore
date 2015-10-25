<div id="errors-page" class="a-center">
    <h2><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Error')." ".$code; ?></h2>

    <div class="error">
        <?php echo CHtml::encode($message); ?>
    </div>
</div>