<div class="numStats">
        <ul>
            <li>
                <?php echo Account::getAAccounts();?>
                <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'accounts');?></span>
            </li>

            <li>
                <?php echo Character::getAChars();?>
                <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'characters');?></span>
            </li>

            <li class="last">
                <?php echo Guild::getAGuilds();?>
                <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'guilds');?></span>
            </li>
        </ul>
    <div class="clear"></div>
</div>
