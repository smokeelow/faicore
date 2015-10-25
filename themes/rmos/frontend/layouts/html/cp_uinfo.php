<?php $currency = Currency::getUCurrency();?>

<div id="user-main-info">

    <div id="user-currency">
        <div id="rewards">
            <ul id="values">
                <li class="wcoinp">
                    <span class="currency">W Coin(P)</span>
                    <span><?php echo $currency['wcoin_p'];?></span>
                    <div class="clear"></div>
                </li>
                <li class="wcoinc">
                    <span class="currency">W Coin(C)</span>
                    <span><?php echo $currency['wcoin_c'];?></span>
                    <div class="clear"></div>
                </li>
                <li class="goblinpoint">
                    <span class="currency">Goblin point</span>
                    <span><?php echo $currency['wcoin_g'];?></span>
                    <div class="clear"></div>
                </li>
                <li class="credits">
                    <span class="currency">Credits</span>
                    <span><?php echo MEMBCREDITS::getCCredits();?></span>
                    <div class="clear"></div>
                </li>
            </ul>
        </div>
        <div id="pAjax">
            <img src="<?php echo $this->getTemplate('core');?>images/up_panel.gif" alt="ajax"/>
            <div class="upd-txt"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Updating');?></div>
        </div>
    </div>


    <div id="char-select">
        <div class="cs-title"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select a character');?>:</div>
        <?php
            echo CHtml::dropDownList('char', '',Character::getAChars(),
                array(
                'options'=>array(Yii::app()->user->char=>array('selected'=>'selected')),
        ));
        ?>
    </div>

    <div class="exit-link n-info">
        <a href="<?php echo $this->createUrl('cp/logout');?>">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Sign out');?>
        </a>
    </div>
</div>
  <div class="clear"></div>

<script>
jQuery(function(){
    jQuery('#char').bind("change",function (){
        jQuery.ajax({
            type: 'POST',
            url:  '<?php echo $this->createUrl('/cp/update');?>',
            cache: false,
            data: '&char=' + jQuery('#char').val(),
            success: function(){
                jQuery("#main-content").load('<?php echo Yii::app()->request->requestUri;?> #main-content');
            }
        });
    });

});

    function getVoteUrl()
    {
         window.open('<?php echo $this->getFConfig('mmotopURL')?>');
    }

    function checkVoteList()
    {
        jQuery('.check-btn').attr("disabled", "disabled");
        jQuery('#user-currency ul').animate({opacity: 0}, 150);
        jQuery('#pAjax').animate({top: '4px', opacity: 1},220);
        jQuery.ajax({
            type: 'POST',
            url:  'votecheck',
            cache: false,
            data: '&VoteC=',
            success: function(data){
                jQuery("#rewards").load('<?php echo Yii::app()->request->requestUri;?> #values');
                jQuery("#main-content").load('<?php echo Yii::app()->request->requestUri;?> #main-content');
                jQuery('#pAjax').animate({top: '-90px', opacity: 0},220);
                jQuery('.check-btn').removeAttr("disabled");
                jQuery('#respom').html(data.msg)
            }
        });
    }

</script>
