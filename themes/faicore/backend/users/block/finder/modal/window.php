<div id="finder-modal">
    <div id="finder-modal-content">

    </div>
    <div id="finder-modal-actions">
        <span id="finder-close-modal">
            Close
        </span>
    </div>

    <div id="finder-modal-ajax">
        <img src="<?php echo $this->getTemplate('backend');?>images/finder-ajax-modal.gif" alt="ajax"/>
    </div>
</div>

<script>
    jQuery(function(){
        jQuery('#finder-close-modal').on('click',function(){
            jQuery('#finder-modal').css('top','-410px');
            jQuery('#finder-modal-content').fadeOut('fast');
        });
    })
</script>