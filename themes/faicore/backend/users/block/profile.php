<div class="m-header">
    <?php echo $this->pageH1;?>
</div>

<div class="t-h-row">
    <div class="wrapper">
        <ul>
            <li>
                <?php echo CHtml::link(
                '<img src="'.$this->getTemplate('backend').'images/mail_new3.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Write a letter').'"/><span>'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Write a letter').'</span>',
                array('compose', 'id'=>$model->memb_guid,'action'=>Yii::app()->controller->action->id),
                array('id'=>'compose', 'onClick'=>'getBlock(this);return false;')) ?>
            </li>

            <li>
                <?php echo CHtml::link(
                '<img src="'.$this->getTemplate('backend').'images/user_info_small.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Send data').'"/><span>'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Send data').'</span>',
                array('reginfo', 'id'=>$model->memb_guid,'action'=>Yii::app()->controller->action->id),
                array('id'=>'compose', 'onClick'=>'getBlock(this);return false;')) ?>
            </li>

        </ul>
    </div>
</div>

 <div class="block-cont">
     <?php echo $this->renderPartial('block/profile/characters', array('chars'=>$chars));?>
 </div>