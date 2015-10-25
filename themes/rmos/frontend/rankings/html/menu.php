<div id="ranking-faicore-menu">
    <?php $this->widget('zii.widgets.CMenu',array(
        'items'=>array(
            array('label'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Character ranking'),  'url'=>array('/rankings/index'),  'active'=>$this->action->id == 'index' ),
            array('label'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Guild ranking'),      'url'=>array('/rankings/guilds'), 'active'=>$this->action->id == 'guilds'),
        ),
        'encodeLabel'=>false,
    )); ?>
</div>
