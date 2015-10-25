jQuery(function(){
    jQuery('.core-messages').fadeIn(300);
    jQuery('.core-messages li').bind('click',function(){
        jQuery(this).animate({height: 0, opacity: '0', marginBottom: '0px'}, 300).fadeOut(10);
    });

    jQuery('#back-btn').click(function(){
        parent.history.back();
        return false;
    });

    jQuery('#modal-close').bind('click',function(){
       hideOverlay();
    });

    jQuery(window).bind('resize',function(){
        jQuery('.overlay').css('height',''+jQuery(this).height()+'');
    });

    var mCheck = false;
    jQuery('.finder-raw ').hover(function(){
        mCheck=true;
    }, function(){
        mCheck=false;
    });

});


function getModalWindow(link)
{
    getOverlay();
    getModal();
    jQuery.ajax({
        type: 'GET',
        url: jQuery(link).attr('href'),
        cache: false,
        success:function(html){
            jQuery('#modal-content').append(html);
        }
    });
}

function getOverlay()
{
    var wh = jQuery(window).height();
    jQuery('body').css('overflow','hidden')
    jQuery('.bg-overlay').fadeIn(100);
    jQuery('.overlay').css({height: wh}).fadeIn(200);
}

function hideOverlay()
{
    hideModal();
    jQuery('#main-s-wrapper').removeAttr('style');
    jQuery('body').removeAttr('style');
    jQuery('.overlay').fadeOut(150);
    jQuery('.bg-overlay').fadeOut(150);
    clearModal();
}

function getModal()
{
    jQuery('#modal-window').fadeIn(150);
}

function hideModal()
{
    jQuery('#modal-window').fadeOut(150);
}

function clearModal()
{
    jQuery('#modal-content').empty();
}

function hideBlock()
{
    jQuery('.block-cont').fadeOut(1);
}

function showBlock()
{
    jQuery('.block-cont').fadeIn(1);
}

function clearBlock()
{
    jQuery('.block-cont').empty();
}

function showAjax()
{
    jQuery('#ajax-modal').fadeIn(1);
}

function showSmallAjax(element)
{
    jQuery(element).append('<img class="small-ajax" src="/skin/backend/faicore/images/smallAjax.gif" alt="ajax"/>');
}

function hideSmallAjax()
{
    jQuery('.small-ajax').remove();
}

function goToTable(name)
{
    hideModal();
    hideOverlay();

    jQuery('.fai-table input[name="Account[memb___id]"]').focus();
    jQuery('.fai-table input[name="Account[memb___id]"]').val(jQuery(name).text().replace(/\s+/g, ''));
}

function getBlock(link)
{
    jQuery('#modal-content').animate({opacity: 0},50,
        function(){
            clearModal();
            jQuery(this).animate({opacity: 1},100);

            showAjax();
            jQuery.ajax({
                type: 'GET',
                url: jQuery(link).attr('href'),
                cache: false,
                success:function(data){
                    jQuery('#ajax-modal').animate({opacity: 0},1, function(){
                        jQuery('#modal-content').append(data);
                        jQuery('#ajax-modal').css('opacity','1').fadeOut(100);
                    });
                }
            });
        });
}

function sendRegInfo(link)
{
    showAjax();
    hideBlock();
    jQuery.ajax({
        type: 'POST',
        url: ''+jQuery(link).attr('href')+'',
        data: '&send=1',
        success:function(html){
            jQuery('#ajax-modal').animate({opacity: 0},100, function(){
                clearBlock();
                showBlock();
                jQuery('.block-cont').append(html);
            });
        }
    });
}

function getLockAction(link)
{
    jQuery.ajax({
        type:'POST',
        url: ''+jQuery(link).attr('href')+'',
        data:'&lock=1',
        success:function(data){
                jQuery(link).empty();
                jQuery(link).attr('onClick','getUnLockAction(this);return false;');
                jQuery(link).attr('href',''+data+'');
                jQuery(link).attr('title','Unlock character')
                jQuery(link).append('<img class="unlck" src="/skin/backend/faicore/images/lock-unlock.png" alt="Unlock character"/>');
        }
    })
}


function getUnLockAction(link)
{
    jQuery.ajax({
        type:'POST',
        url: ''+jQuery(link).attr('href')+'',
        data:'&lock=1',
        success:function(data){
            jQuery(link).empty();
            jQuery(link).attr('onClick','getLockAction(this);return false;');
            jQuery(link).attr('href',''+data+'');
            jQuery(link).attr('title','Lock character');
            jQuery(link).append('<img src="/skin/backend/faicore/images/ban.png" alt="Lock character"/>');
        }
    })
}


function sendMail()
{
    jQuery('#mail-form').submit(function(){

        if(jQuery('#MailForm_topic').val() == '' || jQuery('#MailForm_message').val() == '')
        {
            if(jQuery('#MailForm_topic').val() == '')
            {
                if(jQuery("#MailForm_topic").is(".success"))
                {
                    jQuery('#MailForm_topic').removeClass("success");
                }

                jQuery('#MailForm_topic').addClass('error');
            }
            else
            {
                if(jQuery("#MailForm_topic").is(".error"))
                {
                    jQuery('#MailForm_topic').removeClass('error');
                }
                jQuery('#MailForm_topic').addClass('success');
            }

            if(jQuery('#MailForm_message').val() == '')
            {
                if(jQuery("#MailForm_message").is(".success"))
                {
                    jQuery('#MailForm_message').removeClass('success');
                }
                jQuery('#MailForm_message').addClass("error");
            }
            else
            {
                if(jQuery("#MailForm_message").is(".error"))
                {
                    jQuery('#MailForm_message').removeClass("error");
                }
                jQuery('#MailForm_message').addClass("success");
            }
            return false;
        }
        else if(jQuery('#MailForm_topic').val() != '' || jQuery('#MailForm_message').val() != '')
        {
            showAjax();
            jQuery('.form').fadeOut(100);

            jQuery.ajax({
                type: 'POST',
                url: jQuery('#mail-form').attr('action'),
                data: '&compose=1' + '&topic='+ jQuery('#MailForm_topic').val() + '&message=' + jQuery('#MailForm_message').val(),
                success:function(data){
                    jQuery('#ajax-modal').animate({opacity: 0},100, function(){
                        clearBlock();
                        jQuery('.block-cont').append(data);
                    });
                }
            })
            return false;
        }

    })
}

function clearFinderContent(block)
{
    document.getElementById(block).innerHTML = '';
}

function findAcc(char,url)
{
    var finderInput = jQuery(char);
    var finderContent = jQuery('#finder-content');

    if(finderInput.val() == '')
    {
        finderContent.css('display','none');
        clearFinderContent('finder-content');
    }
    else
    {
        finderContent.css('display','none');
        finderInput.addClass('finder-action');
        jQuery.ajax({
            type:'POST',
            url: url,
            data:'&char='+finderInput.val(),
            cache: false,
            success:function(html){
                finderInput.removeClass('finder-action');
                clearFinderContent('finder-content');
                finderContent.append(html).css('display','block');
            }
        });
    }
}

function getFinderSubMenu(link,block)
{
    var settings = jQuery(block);
    var title = jQuery(link).parent();
    var link = jQuery(link);
    if(settings.hasClass('opened'))
    {
        link.removeClass('active-settings')
        title.removeAttr('style');
        settings.removeClass('opened').css({top: '-105px'});
    }
    else
    {
        title.css('opacity','1');
        link.addClass('active-settings')
        settings.addClass('opened').css({top: '37px'});
    }
}

function getFinderWindow(link)
{
    var finderModalContent = jQuery('#finder-modal-content');
    var finderModal = jQuery('#finder-modal');
    var ajax = jQuery('#finder-modal-ajax');
    ajax.fadeIn('fast');
    jQuery.ajax({
        type:'GET',
        url: jQuery(link).attr('href'),
        cache: false,
        success:function(html){
            clearFinderContent('finder-modal-content');
            finderModal.css({top: '26px'});
            ajax.fadeOut('fast',function(){
                finderModalContent.append(html).css('display','block');
            });
        }
    })
}

