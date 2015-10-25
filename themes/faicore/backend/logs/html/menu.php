<?php
    $this->widget('zii.widgets.CMenu',array(
    'items'=>array(
    array('label'=>'<img src="'.$this->getTemplate('backend').'images/contact-new.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Registration').'"/><span>'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Registration').'</span>', 'url'=>array('logs/reg'), 'active'=>$this->action->id=='reg', 'visible'=>Yii::app()->getUser()->checkAccess('administrator') || Yii::app()->getUser()->checkAccess('super-administrator')),
    array('label'=>'<img src="'.$this->getTemplate('backend').'images/cross_circle_frame.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Errors').'"/><span>'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Errors').'</span>', 'url'=>array('logs/error'), 'active'=>$this->action->id=='error', 'visible'=>Yii::app()->getUser()->checkAccess('administrator') || Yii::app()->getUser()->checkAccess('super-administrator')),
    ),
    'encodeLabel'=>false,
    ));
