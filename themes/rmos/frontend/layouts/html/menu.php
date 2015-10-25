<?php if($this->beginCache('topNMenu' , array(
    'varyByExpression'=>Yii::app()->request->cookies['language']->value.Yii::app()->request->cookies['server']->value,
    'duration'=>1200,
    'varyByRoute' => true))) { ?>

<?php $this->widget('zii.widgets.CMenu',array(
    'items'=>array(
        array('label'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Home'),'url'=>array('/main/index'),'active' => Yii::app()->controller->getId() == 'main' && $this->action->id == 'index' || Yii::app()->controller->getId() == 'main' && $this->action->id == 'view','linkOptions'=>array('id'=>'main')),
        array('label'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Forum'),'url'=>array('/main/forum', ), 'linkOptions'=>array('id'=>'forum')),
        array('label'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'About Us'),'url'=>array('/about/index'), 'active'=>Yii::app()->controller->getId() == 'about', 'linkOptions'=>array('id'=>'about')),
        array('label'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Files'),'url'=>array('/main/files'), 'active'=> $this->action->id == 'files','linkOptions'=>array('id'=>'download')),
        array('label'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Rankings'),'url'=>array('/rankings/index'), 'active' => Yii::app()->controller->getId() == 'rankings','linkOptions'=>array('id'=>'stat')),
        array('label'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Help'),'url'=>array('/#'),'linkOptions'=>array('id'=>'help')),

    ),
    'encodeLabel'=>false,
    'id'=>'menu'
)); ?>

<?php $this->endCache(); } ?>