<link href="<?php echo $this->getTemplate('backend');?>css/custom-ui.css" rel="stylesheet" type="text/css"/>

<div id="finder-ban">
    <div id="usr-avatar">
        <img width="70" height="70" src="<?php echo $this->getFinderAccImage($model->usr_avatar);?>" alt="<?php echo $model->memb___id;?>"/>
    </div>
    <div id="user-acc">
        <?php echo $model->memb___id;?>
    </div>
    <div>
    <label for="from">From</label>
    <input type="text" id="from" name="from" />
    <label for="to">to</label>
    <input type="text" id="to" name="to" />
    </div>
</div>



<script>
    jQuery(function() {
        jQuery("#from").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 3,
            onClose: function( selectedDate ) {
                jQuery("#to").datepicker( "option", "minDate", selectedDate );
            }
        });
        jQuery("#to").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 3,
            onClose: function( selectedDate ) {
                jQuery( "#from" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
    });
</script>