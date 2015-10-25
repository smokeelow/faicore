<div id="tickets">
<div id="ticket-tabs">
    <ul>
        <li>
            <a id="open" onclick="getTicketTab(this);return false;" href="<?php echo $this->createUrl('cp/ajax',array('id'=>md5('opentickets'.$this->salt)));?>">
                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Open tickets');?>
                <span></span>
            </a>

        </li>
        <li>
            <a id="closed" onclick="getTicketTab(this);return false;" href="<?php echo $this->createUrl('ajax',array('id'=>md5('closedtickets'.$this->salt)));?>">
                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Closed tickets');?>
                <span></span>
            </a>
        </li>
        <li>
            <a id="create" onclick="getTicketTab(this);return false;" href="<?php echo $this->createUrl('ajax',array('id'=>md5('createticket'.$this->salt)));?>">
                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Create ticket');?>
                <span></span>
            </a>
        </li>
    </ul>
    <div class="clear"></div>
</div>
<div id="tab-content">
    <div id="load-tab">

    </div>
    <div id="ticket-ajax">
        <img src="<?php echo $this->getTemplate('core');?>images/up-ajax.gif"/>
    </div>
</div>
<script>
    jQuery(function(){

        jQuery('#ticket-tabs a').on('click',function(){
            return false;
        });

        getTicketTab(jQuery('#ticket-tabs #open'));
    })
</script>
</div>





