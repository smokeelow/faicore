<?php
    $getSkills = json_decode(file_get_contents('protected/core_conf/skills/skills.json'), TRUE);
?>

<div class="page-section skills">
    <div class="section-header ">
        <h3 class="category "><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Skills');?></h3>
    </div>

    <div class="section-body">
        <div id="skill-slider" class="skills-wrapper" <?php echo StaticCore::normalHeight($class);?>>
            <div class="nano">
                <ul class="active-skills clear-after overthrow content">
                    <?php if(sizeof($this->getMagicList($name)) > 0): ?>
                    <?php foreach($this->getMagicList($name) as $id):?>
                    <?php foreach($getSkills as $skillLine):?>
                        <?php if($id != '255'):?>
                            <li>
                                <img class="d3-icon d3-icon-skill d3-icon-skill-42 " src="/images/skills/<?php echo $skillLine[$id]['0'];?>.png" alt="<?php echo $skillLine[$id]['0'];?>">

                                        <span class="skill-name">
                                            <?php echo $skillLine[$id]['0'];?>
                                         </span>
                                        <span class="skill-mana">
                                            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Mana');?>:
                                            <span class="mana-req"><?php echo $skillLine[$id]['3'];?></span>
                                        </span>
                                        <span class="rune-name">
                                            <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Type');?>:
                                            <span class="<?php echo StaticCore::getSElement($skillLine[$id]['9']);?>">
                                                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', ucfirst(StaticCore::getSElement($skillLine[$id]['9'])));?>
                                            </span>
                                        </span>

                                <span class="slot slot-primary"></span>
                            </li>
                            <?php endif;?>
                        <?php endforeach;?>
                    <?php endforeach;?>
                    <?php endif;?>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
