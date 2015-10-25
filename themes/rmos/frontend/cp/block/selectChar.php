<?php
    $chars = 5 - sizeof(Character::getAChars());
?>

<div id="selected-char">
    <div id="schar-info">
        <div id="char-bar-info">

        </div>
    </div>

    <div id="char-select">
        <ul id="hero-tabs">
            <?php foreach(Character::getAChars() as $char):?>
            <li>
                <a class="hero-tab <?php echo strtolower(Character::getCClass($char->Class,'3')).$this->checkCS($char->Name);?>" href="<?php echo $this->createUrl('cp/update',array('id'=>$char->Name));?>" onClick="updateSC(this);return false;">
                    <span class="hero-portrait"></span>
                    <span class="name"><?php echo $char->Name;?></span>
                </a>
            </li>
            <?php endforeach;?>

            <?php for($i=0; $i < $chars; $i++):?>
            <li>
                <span class="hero-tab empty-hero"></span>
            </li>
            <?php endfor;?>
        </ul>
    </div>
</div>

<div class="clear"></div>


<script>
    jQuery(function(){
        jQuery('#selected-char').fadeIn(150,function(){
            jQuery('#hero-tabs .hero-tab').each(function(index){
                jQuery(this).delay(50*index).animate({opacity: 1},250);
            });
        });
        getAjax('<?php echo $this->createUrl('cp/ajax',array('id'=>md5('charinfo'.$this->salt)));?>','#char-bar-info');
    });

    function updateSC(link)
    {
        var tabs = jQuery('#hero-tabs');
        tabs.find('a').each(function(){
            jQuery(this).attr('onClick','return false;');
        });

        showGlobalAjax();
        jQuery.ajax({
            type: 'GET',
            url:  jQuery(link).attr('href'),
            cache: false,
            success: function(){
                jQuery('#hero-tabs a').removeClass('selected-char');
                jQuery(link).addClass('selected-char');
                updateCharInfo();
                updateAction();
                if(getAjax('<?php echo $this->createUrl('cp/ajax',array('id'=>md5('mcharicon'.$this->salt)))?>','#usr-upd-tinfo'))
                {
                    tabs.find('a').each(function(){
                        jQuery(this).attr('onClick','updateSC(this);return false;');
                    });
                    hideGlobalAjax();
                }
            }
        });
    }

    function updateCharInfo()
    {
        var charInfo = jQuery('#char-bar-info');
        charInfo.animate({left: '127px', opacity:0},150, function(){
            jQuery(this).remove();
            jQuery('#schar-info').append('<div id="char-bar-info" style="left:-83px; opacity:0;"></div>');
            getAjax('<?php echo $this->createUrl('cp/ajax',array('id'=>md5('charinfo'.$this->salt)));?>','#char-bar-info');
            jQuery('#char-bar-info').animate({left: '0px', opacity: 1},150);
            result = true;
        });

        return result;
    }
</script>