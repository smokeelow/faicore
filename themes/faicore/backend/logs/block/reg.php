<div class="wrapper">
    <div class="widget">
        <div class="title">
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/list.png" />
            <h6><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'List of users')?></h6>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="fai-table">
            <thead>
            <tr>
                <td width="22px">#</td>
                <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Account')?></td>
                <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Password')?></td>
                <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Name')?></td>
                <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'E-Mail')?></td>
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

                        <td align="center">
                           <?php echo $logLine['0'];?>
                        </td>

                        <td align="center">
                            <?php echo $logLine['1'];?>
                        </td>

                        <td align="center">
                            <?php echo $logLine['2'];?>
                        </td>

                        <td align="center">
                            <?php echo $logLine['3'];?>
                        </td>

                        <td align="center">
                            <?php echo $logLine['5'];?>
                        </td>

                        <td align="center">
                            <img src="<?php echo $this->getTemplate('backend').'images/browsers/'.$this->rmSpace($logLine['6']);?>.png"
                                 alt="<?php echo $logLine['6'].' / '.$logLine['7'];?>"
                                 title="<?php echo $logLine['6'].' / '.$logLine['7'];?>"
                            />

                            <img src="
                            <?php echo $this->getTemplate('backend').'images/browsers/'.$logLine['8'];?>.png"
                                 alt="<?php echo $logLine['8'];?>"
                                 title="<?php echo $logLine['8'];?>"
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