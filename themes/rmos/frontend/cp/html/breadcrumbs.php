<?php $this->widget('zii.widgets.CBreadcrumbs', array(

    'homeLink'=>CHtml::link($this->getFConfig('serverName'),$this->createUrl('main/index')),

    'separator'=>'<span class="breadcrumb-arrow"></span>',

    'links'=>$this->breadcrumbs,

)); ?>
