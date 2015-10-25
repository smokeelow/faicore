<script>
    jQuery(function(){
        jQuery('.core-messages').fadeIn(300);
        jQuery('.core-messages li').bind('click',function(){
            jQuery(this).animate({height: 0, opacity: '0', marginBottom: '0px'}, 300).fadeOut(10);
        });

        if(jQuery('#cp-form').length)
        {
            var entity = 0;
            var allPoints = jQuery('#all-points');

            jQuery('#cp-form .r-entity input').on('keyup',function(e){
                jQuery(this).each(function(){
                    var points = jQuery('#cp-form .r-entity input').getSum();
                    entity = allPoints.attr('data-points') - points < 0 ? 0 :
                            allPoints.attr('data-points') - points;
                    allPoints.text(entity);
                });
            });
        }
    });
</script>