<div id="statistics">
    <div class="stat-row">
        <span class="type">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Total accounts');?>
        </span>

        <span class="count">
            <?php echo Account::getAAccounts();?>
        </span>
    </div>

    <div class="stat-row">
        <span class="type">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Total characters');?>
        </span>

        <span class="count">
            <?php echo Character::getAllChars();?>
        </span>
    </div>

    <div class="stat-row">
        <span class="type">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Total guilds');?>
        </span>

        <span class="count">
            <?php echo Guild::getAGuilds();?>
        </span>
    </div>

    <div class="stat-row sm">
        <span class="type">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Dark Wizards');?>
        </span>

        <span class="count">
            <?php echo Character::getDwStat();?>
        </span>
    </div>

    <div class="stat-row sm">
        <span class="type">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Soul Masters');?>
        </span>

        <span class="count">
            <?php echo Character::getSmStat();?>
        </span>
    </div>

    <div class="stat-row sm">
        <span class="type">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Grand Masters');?>
        </span>

        <span class="count">
            <?php echo Character::getGmStat();?>
        </span>
    </div>

    <div class="stat-row dk">
        <span class="type">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Dark Knights');?>
        </span>

        <span class="count">
            <?php echo Character::getDkStat();?>
        </span>
    </div>

    <div class="stat-row dk">
        <span class="type">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Blade Knights');?>
        </span>

        <span class="count">
            <?php echo Character::getBkStat();?>
        </span>
    </div>

    <div class="stat-row dk">
        <span class="type">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Blade Masters');?>
        </span>

        <span class="count">
            <?php echo Character::getBmStat();?>
        </span>
    </div>

    <div class="stat-row elf">
        <span class="type">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Fairy Elfs');?>
        </span>

        <span class="count">
            <?php echo Character::getFeStat();?>
        </span>
    </div>

    <div class="stat-row elf">
        <span class="type">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Muse Elfs');?>
        </span>

        <span class="count">
            <?php echo Character::getMeStat();?>
        </span>
    </div>

    <div class="stat-row elf">
        <span class="type">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'High Elfs');?>
        </span>

        <span class="count">
            <?php echo Character::getHeStat();?>
        </span>
    </div>

    <div class="stat-row mg">
        <span class="type">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Magic Gladiators');?>
        </span>

        <span class="count">
            <?php echo Character::getMgStat();?>
        </span>
    </div>

    <div class="stat-row mg">
        <span class="type">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Duel Masters');?>
        </span>

        <span class="count">
            <?php echo Character::getDmStat();?>
        </span>
    </div>

    <div class="stat-row dl">
        <span class="type">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Dark Lords');?>
        </span>

        <span class="count">
            <?php echo Character::getDlStat();?>
        </span>
    </div>

    <div class="stat-row dl">
        <span class="type">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Lord Emperros');?>
        </span>

        <span class="count">
            <?php echo Character::getleStat();?>
        </span>
    </div>

    <div class="stat-row sum">
        <span class="type">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Summoners');?>
        </span>

        <span class="count">
            <?php echo Character::getSumStat();?>
        </span>
    </div>

    <div class="stat-row sum">
        <span class="type">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Bloody Summoners');?>
        </span>

        <span class="count">
            <?php echo Character::getBsStat();?>
        </span>
    </div>

    <div class="stat-row sum">
        <span class="type">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Dimension Masters');?>
        </span>

        <span class="count">
            <?php echo Character::getDimStat();?>
        </span>
    </div>

    <div class="stat-row rf">
        <span class="type">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Rage Fighters');?>
        </span>

        <span class="count">
            <?php echo Character::getRfStat();?>
        </span>
    </div>

    <div class="stat-row rf">
        <span class="type">
            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Fist Masters');?>
        </span>

        <span class="count">
            <?php echo Character::getFmStat();?>
        </span>
    </div>
</div>