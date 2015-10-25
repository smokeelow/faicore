<?php if($this->beginCache('CpSideBarMenu',array(
    'varyByExpression'=>Yii::app()->request->cookies['language']->value,
    'duration'=>7200,
    'varyByRoute' => true))) { ?>

<div class="sidebar-cp-menu">
    <?php $this->widget('zii.widgets.CMenu',array(
        'items'=>array(
            array('label'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Home'),'template'=>'<span class="nav-rarrow"><span class="icon-16 icon-16-rarrow-small"></span></span>{menu}', 'url'=>array('cp/index'), 'active'=> Yii::app()->controller->getId() == 'cp' && $this->action->id == 'index' || Yii::app()->controller->getId() == 'cp' && $this->action->id == 'article'),
            array('label'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Characters'),'template'=>'<span class="nav-rarrow"><span class="icon-16 icon-16-rarrow-small"></span></span>{menu}',  'url'=>array('cp/characters'), 'active'=>$this->action->id == 'characters' ),
            array('label'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Ticket system'),'template'=>'<span class="nav-rarrow"><span class="icon-16 icon-16-rarrow-small"></span></span>{menu}',  'url'=>array('/cp/report'), 'active'=>$this->action->id == 'report' || $this->action->id == 'create' || Yii::app()->controller->getId() == 'cp' && $this->action->id == 'view'),
//            array('label'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Payment Methods'),'template'=>'<span class="nav-rarrow"><span class="icon-16 icon-16-rarrow-small"></span></span>{menu}',  'url'=>array('cp/payment'), 'active'=>$this->action->id == 'payment' ),
            array('label'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Settings'),'template'=>'<span class="nav-rarrow"><span class="icon-16 icon-16-rarrow-small"></span></span>{menu}',  'url'=>array('/cp/settings'), 'active'=>$this->action->id == 'settings'),
        ),
        'encodeLabel'=>false,
    )); ?>
</div>

<?php $this->endCache(); } ?>