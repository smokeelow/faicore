<div id="avatar" class="acc-set-section">
    <div class="sec-title">
        <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Change avatar');?>
    </div>

    <div id="usr-avatar">
        <?php if($model->usr_avatar == ''):?>
            <img id="<?php echo Yii::app()->user->username;?>-avatar" width="95" height="95" class="no-avatar" src="<?php echo $this->getTemplate('core');?>images/no-avatar.png" alt="no-avatar"/>
        <?php else:?>
            <img id="<?php echo Yii::app()->user->username;?>-avatar" width="95" height="95"  class="existing" src="<?php echo $model->usr_avatar;?>"/>
        <?php endif;?>
    </div>
    <div class="row">
        <label for="Account_usr_avatar">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter the link to the image from another resource');?>
        </label>
        <div class="r-right">
            <?php echo $form->textField($model,'usr_avatar',array('maxlength'=>255)); ?>
            <?php echo $form->error($model,'usr_avatar'); ?>
        </div>

        <div id="recommend-fo">
            <div class="title">
                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Recommended resources');?>:
            </div>
           <ul>
               <li>
                   <a href="https://www.dropbox.com/install" target="_blank" id="dropbox">
                       Dropbox
                   </a>
               </li>
               <li>
                   <a href="http://disk.yandex.ru/" target="_blank" id="yandex-disk">
                       Yandex.Disk
                   </a>
               </li>
               <li>
                   <a href="https://drive.google.com/" target="_blank" id="google-drive">
                       Google Drive
                   </a>
               </li>
               <li>
                   <a href="https://skydrive.live.com/" target="_blank" id="sky-drive">
                       SkyDrive
                   </a>
               </li>
               <div class="clear"></div>
           </ul>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>