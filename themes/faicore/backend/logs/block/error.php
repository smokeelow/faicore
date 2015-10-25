<div class="wrapper">
    <div class="widget">
        <div class="title">
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/list.png" />
            <h6><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'List of errors')?></h6>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="fai-table">
            <thead>
            <tr>
                <td width="22px">#</td>
                <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Error code')?></td>
                <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'URL')?></td>
                <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Message')?></td>
                <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Date')?></td>
                <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Browser').' / '.
                    Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'OS')?></td>
                <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'IP Address')?></td>


            </tr>
            </thead>

            <tbody>
            <?php foreach($reportArray as $line): ?>
                <?php $logLine = explode("\t",$line);?>
            <tr>
                <td align="center">
                    <?php echo ++$count;?>
                </td>

                <td  align="center">
                    <?php echo $logLine['1'];?>
                </td>

                <td width="240" align="center">
                    <?php echo $logLine['0'];?>
                </td>

                <td width="330" align="center">
                    <?php echo $logLine['2'];?>
                </td>

                <td align="center">
                    <?php echo $logLine['3'];?>
                </td>

                <td align="center">
                    <img src="<?php echo $this->getTemplate('backend').'images/browsers/'.$this->rmSpace($logLine['5']);?>.png"
                         alt="<?php echo $logLine['5'].' / '.$logLine['6'];?>"
                         title="<?php echo $logLine['5'].' / '.$logLine['6'];?>"
                            />

                    <img src="
                            <?php echo $this->getTemplate('backend').'images/browsers/'.$logLine['7'];?>.png"
                         alt="<?php echo $logLine['7'];?>"
                         title="<?php echo $logLine['7'];?>"
                            />
                </td>

                <td align="center">
                    <?php echo $logLine['4'];?>
                </td>


            </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>