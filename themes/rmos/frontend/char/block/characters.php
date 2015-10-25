<div class="page-section chars-list">
    <div class="section-header ">
        <h3 class="category "><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Characters of').' '.$name;?></h3>


    </div>

    <div class="section-body">
        <div class="other-heroes list-table hero-table">
            <div class="chars-titles">
                <span class="name-title">
                    <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Name');?>
                </span>
                <span class="class-title">
                    <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Class');?>
                </span>
                <span class="level-title">
                    <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Level');?>
                </span>
                <span class="res-title">
                    <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset');?>
                </span>
                <span class="greset-title">
                    <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'GR');?>
                </span>
                <span class="guild-title">
                    <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Guild');?>
                </span>
            </div>
            <ul>
                <?php foreach($chars as $key => $char):?>
                <li class="<?php echo StaticCore::getRClass($key);?>">
                    <a href="<?php echo $this->createUrl('char/inventory', array('id'=>$char->Name));?>" onclick="getModalWindow(this);return false;">
                        <span class="cell col-measure"><?php echo Character::model()->getCGuild($char->Name);?></span>
								<span class="cell col-hero">


                        <img class="icon-portrait icon-frame " src="<?php echo Character::getCClass($char->Class,4);?>" width="21" height="21" alt="<?php echo $char->Name;?>"/>
                            <span class="frame"></span>

								    <?php echo $char->Name;?>
								</span>
                        <span class="cell col-class"><?php echo Character::getCClass($char->Class,0);?>
                                <span class="col-lvl"><?php echo $char->cLevel;?></span>
                                <span class="col-res"><?php $reset = $this->getFConfig('reset_col'); echo $char->$reset?></span>
                                <span class="col-gres"><?php $gReset = $this->getFConfig('greset_col'); echo $char->$gReset?></span>
                        </span>
                    </a>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>

    <div class="upd-time">
        <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Last updated').': '.News::getDate(date("d M Y -.H:i",time()));?>
    </div>
</div>