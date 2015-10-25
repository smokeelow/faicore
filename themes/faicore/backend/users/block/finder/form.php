<?php echo $this->renderPartial('block/finder/modal/window');?>
<div id="finder-wrapper">
    <input
           onkeyup="findAcc(this,'<?php echo $this->createUrl('ajax',array('string'=>md5('getAll'.$this->salt)));?>')"
           autocomplete="off"
           id="finder"
           type="text"
           placeholder="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Stat enter character name...');?>"
           name="search"
    />
</div>