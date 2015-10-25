<ul id="acc-set-links">
    <li>
        <a id="voting-panel" href="<?php echo $this->createUrl('cp/ajax',array('id'=>md5('voting'.$this->salt)));?>" onclick="getUPPart(this);return false;">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Voting');?>
        </a>
    </li>
</ul>
<script>
    jQuery(function(){
        getUPPart(jQuery('#voting-panel'));
    });
</script>