<div class="features">
    <div class="t-arrow">&nbsp;</div>
    <div class="features-bot">
        <div class="features-top">
            <div id="usr-panel-cont">
                <div class="category">

                </div>

                <div id="up-win-cont">

                </div>

            </div>
            <div id="up-bot-ar">
                <a href="#" id="up-close-win" class="up-m-button">
                    <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Close');?>
                </a>
            </div>
        </div>
        <div id="upanel-notif" onclick="hideUPNotify();">sds</div>
        <div id="ajax-modal-panel"><img src="<?php echo $this->getTemplate('core');?>images/up-ajax.gif" alt="ajax"/></div>
    </div>
</div>
<script>
    jQuery(function(){
        jQuery('#up-close-win').bind('click',function(){
            hideUserPanel(jQuery('#slide-a'));
            return false;
        });
    })
</script>