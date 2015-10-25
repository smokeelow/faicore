<div class="main-char-info">
    <div class="bg-attr-sklz">
    <div class="page-section attributes">
        <div class="section-header ">
            <h3 class="category ">
                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Attributes');?></h3>
        </div>

        <div class="section-body">

            <ul class="attributes-core">
                <li class="tip">
                    <span class="label"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Strength');?></span>
                    <span class="value"><?php echo $model->Strength;?></span>
                </li>
                <li class="tip">
                    <span class="label"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Agility');?></span>
                    <span class="value"><?php echo $model->Dexterity;?></span>
                </li>
                <li class="tip">
                    <span class="label"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Vitality');?></span>
                    <span class="value"><?php echo $model->Vitality;?></span>
                </li>
                <li class="tip">
                    <span class="label"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Energy');?></span>
                    <span class="value"><?php echo $model->Energy;?></span>
                </li>
                <?php if($model->Class == '64' || $model->Class == '65' || $model->Class == '66'):?>
                    <li class="tip">
                        <span class="label"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Command');?></span>
                        <span class="value"><?php echo $model->Leadership;?></span>
                    </li>
                <?php endif;?>
                <li class="clear"></li>
            </ul>
            <ul class="attributes-core secondary">
                <li class="tip">
                    <span class="label"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Class');?></span>
                    <span class="value"><?php echo Character::getCClass($model->Class,0);?></span>
                </li>
                <li class="tip">
                    <span class="label"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Status');?></span>
                    <span class="value <?php echo Character::model()->getIntToTxt(Character::model()->getOInfo($model->AccountID,$model->Name));?>"><?php echo ucfirst(Character::model()->getIntToTxt(Character::model()->getOInfo($model->AccountID,$model->Name)));?></span>
                </li>
                <li class="tip">
                    <span class="label"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Guild');?></span>
                    <span class="value"><?php echo Character::model()->getCGuild($model->Name);?></span>
                </li>
                <li class="tip">
                    <span class="label"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Level');?></span>
                    <span class="value"><?php echo $model->cLevel;?></span>
                </li>
                <li class="tip">
                    <span class="label"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset');?></span>
                    <span class="value"><?php $reset = $this->getFConfig('reset_col'); echo $model->$reset;?></span>
                </li>
                <li class="tip">
                    <span class="label"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Grand Reset');?></span>
                    <span class="value"><?php $gReset = $this->getFConfig('greset_col'); echo $model->$gReset;?></span>
                </li>
                <li class="tip">
                    <span class="label"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Map');?></span>
                    <span class="value <?php if($this->getFConfig('showMapCoord')):?>item<?php endif;?>"
                    <?php if($this->getFConfig('showMapCoord')):?>
                          title="<?php echo $this->getMap($model->MapNumber).' ('.$model->MapPosX.'x'.$model->MapPosY.')';?>"
                    <?php endif;?>><?php echo $this->getMap($model->MapNumber);?></span>
                </li>
                <li class="tip">
                    <span class="label"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'PK Status');?></span>
                    <span class="value <?php echo strtolower(StaticCore::getPStatus($model->PkLevel));?>"><?php echo StaticCore::getPStatus($model->PkLevel);?></span>
                </li>
                <li class="clear"></li>
            </ul>

            <ul class="resources">
                <li class="resource tip">
					<span class="resource-icon resource-mana">
						<span class="value"><?php echo ceil($model->Mana);?></span>
					</span>
                    <span class="label-wrapper"><span class="label"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Mana');?></span></span>
                </li>

                <li class="resource tip">
				<span class="resource-icon resource-life">
					<span class="value"><?php echo ceil($model->Life);?></span>
				</span>
                    <span class="label-wrapper"><span class="label"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Health');?></span></span>
                </li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>

    <?php echo $this->renderPartial('block/magicList',array('name'=>$model->Name,'class'=>$model->Class));?>
        <div class="clear"></div>
    </div>

    <?php if($this->getFConfig('showAccChars')): ?>
        <?php echo $this->renderPartial('block/characters',array('chars'=>$chars, 'name'=>$model->Name));?>
    <?php endif;?>
</div>
