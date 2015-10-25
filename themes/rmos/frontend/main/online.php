<div class="fai-table">
<table class="items">
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th>№</th>
            <th><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Name');?></th>
            <th><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Class');?></th>
            <th><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'LVL');?></th>
            <th><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'RES');?></th>
            <th><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'GR');?></th>
            <th><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Guild');?></th>
            <th><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Logo');?></th>
            <th><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Location');?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($onlineArray as $item):?>
        <?php
            $charEntity = Character::getCharRow($item->mainChar->GameIDC,'Class,cLevel,'.$this->getFConfig('reset_col').','.$this->getFConfig('greset_col').',MapNumber');
            $reset = $this->getFConfig('reset_col');
            $gReset = $this->getFConfig('greset_col');
            $i++;
        ?>
        <tr class="<?php echo $this->getOddEven($i);?>">
            <td class="online" width="2px">&nbsp;</td>
            <td align="center" width="10%"><?php echo $i;?></td>
            <td width="10%">
                <a onclick="getModalWindow(this);return false;" href="<?php echo $this->createUrl('char/inventory',array('id'=>$item->mainChar->GameIDC));?>">
                    <?php echo $item->mainChar->GameIDC;?>
                </a>
            </td>
            <td align="center"><span class="sm"><?php echo $model->getCClass($charEntity->Class,12);?></span></td>
            <td align="center"><?php echo $charEntity->$reset;?></td>
            <td align="center"><?php echo $charEntity->cLevel;?></td>
            <td align="center"><?php echo $charEntity->$gReset;?></td>
            <td align="center"><?php echo $model->getCGuild($item->mainChar->GameIDC);?></td>
            <td align="center"><?php echo $model->getGLogo($model->getCGuild($item->mainChar->GameIDC),16);?></td>
            <td align="center"><?php echo $this->getMap($charEntity->MapNumber);?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
</div>
<div class="upd-time">
    <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Last updated').': '.News::getDate(date("d M Y -.H:i",time()));?>
</div>

