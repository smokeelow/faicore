<?php //if($this->beginCache('serversInfo' , array(
//    'varyByExpression'=>Yii::app()->request->cookies['language']->value.Yii::app()->request->cookies['server']->value,
//    'duration'=>$this->getFConfig('serverCache'),
//    'varyByRoute' => false))) { ?>
<?php
    $top = Character::getTOP1();
?>
<div class="stat-table">
    <div class="tab-line">
        <span class="serv-name"><?php echo $this->getFServer('rmos','serverName');?></span>
        <span class="serv-status">
            <img class="ups" src="<?php echo $this->getTemplate();?>images/<?php echo StaticCore::getSOnline('faicore');?>.jpg" alt="" />
        </span>
        <span class="o-col">
            <a id="total-online" href="<?php echo $this->createUrl('main/online');?>"><?php echo MEMBSTAT_1::getOnline();?></a>
         </span>
    </div>
    <div class="clear"></div>
</div>

<div class="server-totals">

     <div class="total-line">
         <span class="title">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Total accounts');?>:
         </span>

         <span class="entity">
             <?php echo Account_1::getAAccounts();?>
         </span>
     </div>

    <div class="total-line">
         <span class="title">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Total characters');?>:
         </span>

         <span class="entity">
             <?php echo Character_1::getAllChars();?>
         </span>
    </div>
</div>
<div class="best-ch">
    <span class="tab-item">
        <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Top');?> 1:
    </span>
    <span class="tab-r">
         <?php echo CHtml::link($top->Name,Yii::app()->createUrl('char/inventory', array('id'=>$top->Name)),array('onClick'=>'getModalWindow(this);return false;', 'title'=>$top->Name));?>
    </span>
</div>
<?php //$this->endCache(); } ?>