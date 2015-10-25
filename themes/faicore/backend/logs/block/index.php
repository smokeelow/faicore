<div class="wrapper">
    <div class="widget">
        <div class="title">
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/list.png" />
            <h6><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'List of logs')?></h6>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="fai-table">
            <thead>
            <tr>
                <td width="22px">#</td>
                <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Filename')?></td>
                <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Size')?></td>
                <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Actions')?></td>
            </tr>
            </thead>

            <tbody>
                <?php foreach($reportArray as $file): ?>
                    <?php $nameArray = explode("_", $file); ?>
                    <tr>
                        <td align="center">
                            <?php echo ++$count;?>
                        </td>

                        <td>
                            <?php echo $file;?>
                        </td>

                        <td align="center">
                            <?php echo $this->getFileSize(filesize('protected/log/'.$file));?>
                        </td>

                        <td width="132" align="center">
                            <?php echo CHtml::link('<img src="'.$this->getTemplate('backend').'/images/inbox2.png"/>', array('download', 'name'=>$file),array('class' => 's-button', 'title'=>Yii::t(Yii::app()->request->cookies["language"]->value, 'Download')));?>
                            <?php echo CHtml::link('<img src="'.$this->getTemplate('backend').'/images/magnify.png"/>', array(strtolower($nameArray['5']), 'name'=>$file),array('class' => 's-button', 'title'=>Yii::t(Yii::app()->request->cookies["language"]->value, 'View')));?>
                            <?php echo CHtml::link('<img src="'.$this->getTemplate('backend').'/images/close.png"/>', array('delete', 'name'=>$file),array('class' => 's-button', 'title'=>Yii::t(Yii::app()->request->cookies["language"]->value, 'Delete')));?>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>