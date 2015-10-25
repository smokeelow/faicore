<div class="m-header">
    <?php echo $this->pageH1;?>
</div>

<div class="t-h-row">
    <div class="wrapper">
        <ul>
            <li>
                <?php echo CHtml::link(
                '<img src="'.$this->getTemplate('backend').'images/go-back.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Back').'"/><span>'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Back').'</span>',
                array($action, 'id'=>$model->memb_guid),
                array('id'=>'back-btn', 'onClick'=>'getBlock(this);return false;')) ?>
            </li>
        </ul>
    </div>
</div>

<div class="block-cont">
    <div id="reg-usr-info">
        <div class="info-line">
                       <span class="type">
                           <?php echo Yii::t(Yii::app()->request->cookies['language']->value, 'Account');?>:
                       </span>
                       <span class="val">
                           <?php echo $model->memb___id;?>
                       </span>
        </div>

        <?php if($this->getFConfig('md5') != '1'):?>
        <div class="info-line">
                       <span class="type">
                           <?php echo Yii::t(Yii::app()->request->cookies['language']->value, 'Password');?>:
                       </span>
                       <span class="val">
                           <?php echo $model->memb__pwd;?>
                       </span>
        </div>
        <?php endif;?>

        <div class="info-line">
                       <span class="type">
                           <?php echo Yii::t(Yii::app()->request->cookies['language']->value, 'Name');?>:
                       </span>
                       <span class="val">
                           <?php echo $model->memb_name;?>
                       </span>
        </div>

        <div class="info-line">
                       <span class="type">
                           <?php echo Yii::t(Yii::app()->request->cookies['language']->value, 'E-Mail');?>:
                       </span>
                       <span class="val">
                           <?php echo $model->mail_addr;?>
                       </span>
        </div>

        <?php echo CHtml::link(Yii::t(Yii::app()->request->cookies['language']->value, 'Send'),array('sendreginfo', 'id'=>$model->memb_guid),array('class'=>'button add-btn', 'id'=>'send-regi', 'onClick'=>'sendRegInfo(this);return false;'));?>
    </div>
</div>