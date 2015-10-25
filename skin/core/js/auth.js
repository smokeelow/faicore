jQuery(function()
{
    jQuery("#faicore-reg-form #Account_memb__pwd").focusout(function(){
       if(jQuery("#faicore-reg-form div").eq(0).hasClass('success') || jQuery("#faicore-reg-form div").eq(1).hasClass('success'))
       {

       }
    });

    jQuery('.core-messages').fadeIn(100);
    jQuery('.core-messages').bind('click',function(){
        jQuery(this).animate({height: 0, opacity: '0', marginBottom: '0px'}, 300).fadeOut(10);
    });


    if(jQuery('.core-messages').css('display') == ('block'))
    {
        jQuery('#Account_memb___id').focus();
        jQuery('.row').addClass('error');
        jQuery('.line').addClass('error');
    }

});
