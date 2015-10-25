<script>
    jQuery(function(){
        jQuery('#Account_usr_avatar').on('blur',function(){
            setTimeout('checkImage();',500);
        });

    });

    function checkImage()
    {
        if(jQuery('#avatar .r-right').is('.success') || jQuery('#<?php echo Yii::app()->user->username;?>-avatar').is('.existing'))
        {
            jQuery('#<?php echo Yii::app()->user->username;?>-avatar').attr('src',jQuery('#Account_usr_avatar').val());
        }
        else
        {
            jQuery('#<?php echo Yii::app()->user->username;?>-avatar').attr('src','<?php echo $this->getTemplate('core');?>images/no-avatar.png');
        }
    }
</script>