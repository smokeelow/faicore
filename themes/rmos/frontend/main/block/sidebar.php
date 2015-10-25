<div class="status">
    <?php echo $this->renderPartial('../layouts/html/serverOInfo');?>
</div>

<?php echo $this->renderPartial('../layouts/html/login');?>

<div id="last-forum-post" data-url="<?php echo $this->createUrl('ajax/index',array('id'=>'ipbTopics'));?>">
    <div id="load-messages">
        <img src="<?php echo $this->getTemplate('core');?>images/ajaxPosts.gif" alt="ajax-posts"/>
    </div>
</div>

<script>
    jQuery(function(){
        jQuery.ajax({
            type:'GET',
            url:jQuery('#last-forum-post').attr('data-url'),
            cache:false,
            success:function(data)
            {
                jQuery('#last-forum-post').empty().append(data);
            }
        });
    });
</script>