<div class="m-header">
    <?php echo $this->pageH1;?>
</div>

<div class="searchWidget">
        <input type="hidden" value="<?php echo $this->createUrl('users/getacc');?>" id="s-acc"">
        <input onkeyup="findAcc(this)" autocomplete="off" id="search-acc" type="text" name="search" placeholder="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Stat enter character name...');?>">
</div>


<div class="block-cont">



</div>
