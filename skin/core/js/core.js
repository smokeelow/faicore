var slideA;
var ajaxModal;
var userPanel;
var upContent;
var result = false;
var tab;

$.fn.getSum = function() {
    var sum = 0;
    this.each(function() {
        if ( $(this).is(':input') ) {
            var val = $(this).val();
        } else {
            var val = $(this).text();
        }
        sum += parseInt( ('0' + val).replace(/[^0-9]/, ''), 10 );
    });
    return sum;
};

jQuery(function(){

    var faiLoginObj = jQuery('#faicore-ajax');
    var faiLoginStr = '#faicore-ajax';

    if(jQuery('div').is(faiLoginStr))
    {
        jQuery.ajax({
            type: 'GET',
            url: faiLoginObj.attr('data-url'),
            success:function(data)
            {
                faiLoginObj.append(data)
            }
        });
    }

    jQuery('.core-messages').fadeIn(300);
    jQuery('.core-messages li').bind('click',function(){
        jQuery(this).animate({height: 0, opacity: '0', marginBottom: '0px'}, 300).fadeOut(10);
    });

    jQuery('#back-btn').click(function(){
        parent.history.back();
        return false;
    });

    jQuery('.tooltip').tooltipster({
        animation: 'fade',
        arrow: true,
        arrowColor: '',
        delay: 0,
        fixedWidth: 0,
        followMouse: true,
        offsetX: 0,
        offsetY: 0,
        overrideText: '',
        position: 'bottom-right',
        speed: 100
    });

    jQuery('#modal-close').bind('click',function(){
        hideOverlay();
    });

    jQuery(window).bind('resize',function(){
        jQuery('.overlay').css('height',''+jQuery(this).height()+'');
    });

    jQuery('#confirm-up-bl').bind('click',function(){
        jQuery(this).fadeOut(300);
    });

    var mCheck = false;
    jQuery('.features').hover(function(){
        mCheck=true;
    }, function(){
        mCheck=false;
    });

    jQuery('body').mouseup(function(){
        if(!mCheck)
            hideUserPanel(jQuery('#slide-a'));
    });
});

function getModalWindow(link)
{
    ajaxModal = jQuery('#ajax-modal');
    getOverlay();
    getModal();
    clearModal();
    showAjax();
    jQuery.ajax({
        type: 'GET',
        url: jQuery(link).attr('href'),
        cache: false,
        success:function(data){
            ajaxModal.animate({opacity: 0},1, function(){
                jQuery('#modal-content').append(data);
                ajaxModal.css('opacity','1').fadeOut(100);
                jQuery('#overlay').scrollTo('#modal-wrapper',500);
            });
        }
    });
}

function getBlock(link)
{
    ajaxModal = jQuery('#ajax-modal');
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
                    ajaxModal.animate({opacity: 0},1, function(){
                        jQuery('#modal-content').append(data);
                        ajaxModal.css('opacity','1').fadeOut(100);
                    });
                }
            });
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
    ajaxModal = jQuery('#ajax-modal');
    ajaxModal.fadeIn(1);
}

function showAjaxPanel()
{
    jQuery('#ajax-modal-panel').fadeIn(1);
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

function expandPanel()
{
    jQuery('.features').animate({top: '-8px'},400);
}

function rollUpPanel()
{
    jQuery('.features').fadeOut(150);
}

function clearUserPanel()
{
    jQuery('#up-win-cont').empty();
}

function clearUPW()
{
    jQuery('#confirm-up-bl').empty();
}

function showCUPW(message)
{
    var confMsg = jQuery('#upanel-notif');

    if(confMsg.css('display') == 'none')
    {
        confMsg.empty();
        confMsg.fadeIn(300);
        confMsg.append(message);
    }
    else
    {
        confMsg.empty();
        confMsg.append(message);
    }
}

function removeEvents()
{
    jQuery('html').find('a[onClick]').each(function(){
        jQuery(this).attr('onClick','return false;');
    });
}

function returnEvents()
{
    slideA = jQuery('#slide-a');
    slideA.attr('onClick','hideUserPanel(this);return false;');
    jQuery('#rct').attr('onClick','transferVotes(this);return false;');
    jQuery('.check-btn').attr('onClick','checkVoteList(this);return false;');
}

function hideAjaxPanel()
{
    jQuery('#ajax-modal-panel').css('opacity','1').fadeOut(100);
}

function showUserPanel(link)
{
    slideA = jQuery('#slide-a');
    userPanel = jQuery('.features');
    slideA.addClass('active-item');
    showAjaxPanel();

    userPanel.fadeIn(150,function(){
        jQuery.ajax({
            type:'GET',
            url: jQuery(link).attr('href'),
            success:function(data)
            {
                clearUserPanel();
                jQuery('#up-win-cont').append(data);
                hideAjaxPanel();
            }
        });
    });
}

function hideUserPanel(link)
{
    userPanel = jQuery('.features');
    userPanel.fadeOut(150, function(){
        clearUserPanel();
        jQuery(link).removeClass('active-item');
        jQuery(link).attr('onClick','showUserPanel(this);return false;');
        jQuery('body').removeAttr('onClick');
        getCBF();
    });
}

function getCBF()
{
    jQuery('.char-p-blocks').find('a[onClick]').each(function(){
        jQuery(this).attr('onClick','getModalWindow(this);return false;');
    });
}

function showGlobalAjax()
{
    jQuery('#global-ajax').fadeIn(100);
}

function hideGlobalAjax()
{
    jQuery('#global-ajax').fadeOut(100);
}

function removeUPEvents()
{
    jQuery('#acc-set-links').find('a[onClick]').each(function(){
        jQuery(this).attr('onClick','return false;');
    });
}

function returnUPEvents()
{
    jQuery('#acc-set-links').find('a[onClick]').each(function(){
        jQuery(this).attr('onClick','getUPPart(this);return false;');
    });
}

function clearUPW()
{
    jQuery('#usr-p-content').empty();
}

function getUPPart(link)
{
    clearUPW();
    showAjaxPanel();
    upContent = jQuery('#usr-p-content');
    jQuery('#acc-set-links li a').removeClass('active-up-link');
    jQuery(link).addClass('active-up-link');
    jQuery.ajax({
        type: 'GET',
        url: jQuery(link).attr('href'),
        success:function(data){
            upContent.append(data);
            getCBF();
            hideAjaxPanel();
        }
    });
}

function getAjax(url,block)
{
    jQuery.ajax({
        type: 'GET',
        url: url,
        success:function(data)
        {
            jQuery(block).empty().append(data);
            result = true;
        }
    });
    return result;
}

function getAjaxForm(form,block,check)
{
    showGlobalAjax();
    var options = {
        target: block,
        success: check ? checkActionSuccess : ''
    }

    if(form.ajaxSubmit(options))
    {
        hideGlobalAjax();
    }
}

function updateAction()
{
    var charAction = jQuery('#characters-menu .active-action');
    getAjax(charAction.attr('href'),charAction.attr('data-block'));
}

function checkActionSuccess()
{
    if(!jQuery('.flash-warn').length && !jQuery('.flash-delete').length && !jQuery('.errorSummary').length)
    {
        updateCharInfo();
        result = true;
    }

    return result;
}

function showTicketAjax()
{
    jQuery('#ticket-ajax').fadeIn(50);
}

function clearTicketTab()
{
    tab = jQuery('#load-tab');
    tab.css('display','none').empty();
}

function showTicketTab()
{
    tab = jQuery('#load-tab');
    tab.fadeIn(100);
}

function getTicketTab(link)
{
    clearTicketTab();
    showTicketAjax();
    jQuery.ajax({
        type: 'GET',
        url: jQuery(link).attr('href'),
        cache: false,
        success:function(data)
        {
            jQuery('#load-tab').append(data);
            jQuery('#ticket-tabs a').removeClass('active-tab');
            jQuery(link).addClass('active-tab');
            jQuery('#ticket-ajax').fadeOut(100,function(){
                showTicketTab();
            });
        }
    });
}

function getTicket(link)
{
    clearTicketTab();
    showTicketAjax();
    jQuery.ajax({
        type: 'GET',
        url: jQuery(link).attr('href'),
        cache: false,
        success:function(data)
        {
            jQuery('#load-tab').append(data);
            jQuery('#ticket-ajax').fadeOut(100,function(){
                showTicketTab();
            });
        }
    });
}

function showUPNotify(message,type)
{
    var notify = jQuery('#upanel-notif');
    notify.attr('onclick','');
    if(type)
    {
        notify.empty().append(message.attr('data-notify')).animate({top: '30px'},200);
    }
    else
    {
        notify.empty().append(message).animate({top: '30px'},200);
    }
}

function hideUPNotify()
{
    var notify = jQuery('#upanel-notif');
    notify.animate({top: '4px'},100);
}

function checkVoteList(link)
{
    showUPNotify(jQuery(link),true);
    clearUPW();
    showAjaxPanel();
    jQuery.ajax({
        type: 'GET',
        url:  jQuery(link).attr('href'),
        cache: false,
        success: function(data){
            showUPNotify(data,false);
            jQuery.ajax({
                type:'GET',
                url: jQuery('#voting-panel').attr('href'),
                success:function(data)
                {
                    jQuery('#upanel-notif').attr('onclick','hideUPNotify();');
                    hideAjaxPanel();
                    clearUPW();
                    jQuery('#usr-p-content').append(data);
                }
            });
        }
    });
}