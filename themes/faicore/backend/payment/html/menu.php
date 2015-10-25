<?php
$this->widget('zii.widgets.CMenu',array(
    'items'=>array(
        array('label'=>'<img src="'.$this->getTemplate('backend').'images/interkassa.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Interkassa').'"/><span>'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Interkassa').'</span>', 'url'=>array('payment/interkassa'), 'active'=>$this->action->id=='interkassa', 'visible'=>Yii::app()->getUser()->checkAccess('super-administrator')),
    ),
    'encodeLabel'=>false,
));
