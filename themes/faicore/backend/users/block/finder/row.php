<?php
    $accountInfo = Account::model()->getFinderAccInfo($model->AccountID);
?>
<div id="<?php echo strtolower($model->AccountID).'-'.$i;?>-block"class="finder-raw">
    <div class="widget">
        <div class="title whead">
            <h6><?php echo $model->AccountID;?></h6>
            <div class="titleOpt">
                <a href="#" onclick="getFinderSubMenu(this,'#<?php echo strtolower($model->AccountID).'-'.$i;?>-block .dropdown-menu');return false;"><span class="icos-cog3"></span><div class="clear"></div></a>
            </div>
        </div>
        <ul class="dropdown-menu">
            <li>
                <a href="<?php echo $this->createUrl('users/ajax',array('string'=>md5('getAccBan'.$this->salt),'params'=>$model->AccountID));?>" onclick="getFinderWindow(this);return false;">
                <span class="icos-locked"></span>
                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Block');?>
                </a>
            </li>
        </ul>
        <div class="account-img">
            <img width="70" height="70" src="<?php echo $this->getFinderAccImage($accountInfo->usr_avatar);?>" alt="<?php echo $model->AccountID;?>"/>
        </div>

        <div class="account-pwd">
            <?php echo $accountInfo->memb__pwd;?>
        </div>

        <div class="account-pwd">
            <?php echo $accountInfo->mail_addr;?>
        </div>

        <div class="account-coins">
            <span class="game-credits"><?php echo $accountInfo->Credits;?></span>
            <span class="web-credits"><?php echo $accountInfo->web_credits;?></span>
        </div>

        <div class="account-ban-status <?php echo $accountInfo->bloc_code;?>">
            <?php echo $this->getFinderAccBanStatus($accountInfo->bloc_code);?>
        </div>

        <div class="account-chars">
            <?php echo $this->getFinderCharacters($model->AccountID);?>
        </div>
        <div class="clear"></div>
    </div>
</div>
