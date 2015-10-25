<?php
$this->widget('zii.widgets.CMenu',array(
    'items'=>array(
        array('label'=>'<img src="'.$this->getTemplate('backend').'images/find.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Find account').'"/><span>'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Find account').'</span>', 'url'=>array('users/findacc'), 'visible'=>Yii::app()->getUser()->checkAccess('administrator') || Yii::app()->getUser()->checkAccess('super-administrator'),'linkOptions'=>array('onClick'=>'getModalWindow(this);return false;')),
        array('label'=>'<img src="'.$this->getTemplate('backend').'images/ban.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Characters').'"/><span>'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Characters').'</span>', 'url'=>array('usercp/characters'), 'active'=>$this->action->id=='characters', 'visible'=>Yii::app()->getUser()->checkAccess('administrator') || Yii::app()->getUser()->checkAccess('super-administrator')),
    ),
    'encodeLabel'=>false,
));
?>