<div id="characters">
    <div id="characters-ajax">
        <img src="<?php echo $this->getTemplate('core');?>images/uber-loading.gif"/>
    </div>
</div>

<div id="chars-action-block">
    <?php echo $this->renderPartial('html/charsMenu');?>
    <?php echo $this->renderPartial('block/charsAction');?>
    <div class="clear"></div>
</div>

<script>
    jQuery(function(){
        jQuery('#characters-ajax').fadeOut(100, function(){
            getAjax('<?php echo $this->createUrl('cp/ajax',array('id'=>md5('characters'.$this->salt)))?>','#characters');
        });
    });
</script>