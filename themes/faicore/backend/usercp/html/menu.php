<?php
$this->widget('zii.widgets.CMenu',array(
    'items'=>array(
        array('label'=>'<img src="'.$this->getTemplate('backend').'images/message-add.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add notice').'"/><span>'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add notice').'</span>', 'url'=>array('usercp/create'), 'visible'=>Yii::app()->getUser()->checkAccess('administrator') || Yii::app()->getUser()->checkAccess('super-administrator')),
        array('label'=>'<img src="'.$this->getTemplate('backend').'images/characters.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Characters').'"/><span>'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Characters').'</span>', 'url'=>array('usercp/characters'), 'active'=>$this->action->id=='characters', 'visible'=>Yii::app()->getUser()->checkAccess('administrator') || Yii::app()->getUser()->checkAccess('super-administrator')),
    ),
    'encodeLabel'=>false,
));
?>