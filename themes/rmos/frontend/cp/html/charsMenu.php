<div id="characters-menu">
    <div class="menu-title">
        <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Actions');?>
    </div>
    <ul>
        <?php foreach($this->getCPCharactersMenu() as $item):?>
        <li>
            <a href="<?php echo $this->createUrl('cp/ajax',array('id'=>md5($item.$this->salt)));?>" data-block="#action" onclick="getAction(this);">
                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', ucfirst($item));?>
            </a>
        </li>
        <?php endforeach;?>
    </ul>
</div>

<script>
    jQuery(function(){
        var cpShadow = jQuery('.cp-shadow-bg');
        var height = cpShadow.height();
        var charMenu = jQuery('#characters-menu');
        charMenu.css({height: height});

        jQuery('#characters-menu a').bind('click',function(){
           return false;
        });
    });

    function getAction(link)
    {
        var links = jQuery('#characters-menu a');
        links.each(function(){
            jQuery(this).attr('onClick','return false;');
        });
        links.removeClass('active-action');
        if(getAjax(jQuery(link).attr('href'),jQuery(link).attr('data-block')))
        {
            jQuery(link).addClass('active-action');
            links.each(function(){
                jQuery(this).attr('onClick','getAction(this);');
            });
        }
    }
</script>
