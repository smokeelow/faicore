<?php echo $this->renderPartial('html/menu');?>

<?php
    $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$all,
    'htmlOptions' => array('class' => 'fai-table'),
    'summaryText' => '',
    'ajaxUpdate'=>'false',
    'pager'=>array(
        'header'         => '',
        'firstPageLabel' => '&lt;&lt;',
        'prevPageLabel'  => '<',
        'nextPageLabel'  => '>',
        'lastPageLabel'  => '&gt;&gt;',
     ),
    'enableSorting' => false,
    'columns'=>array(
        array(
            'class'=>'DataColumn',
            'value'=>'',
            'type'=>'raw',
            'evaluateHtmlOptions'=>true,
            'htmlOptions'=>array('class'=>'"{$data->getIntToTxt($data->getOInfo($data->AccountID,$data->Name))}"', 'width'=>'"2px"'),
        ),
        array(
            'header' => '№',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
            'htmlOptions'=>array('align'=>'center', 'width'=>'10%'),
        ),
        array(
            'name'=>'Name',
            'value'=>'$this->getCharDetailInfo($data->Name)',
            'type'=>'raw',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Name'),
            'htmlOptions'=>array('width'=>'10%'),
        ),
        array(
            'name'=>'Class',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Class'),
            'type'=>'raw',
            'value'=>'$data->getCClass($data->Class,12)',
            'htmlOptions'=>array('align'=>'center'),
        ),
        array(
            'name'=>'cLevel',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'LVL'),
            'htmlOptions'=>array('align'=>'center'),
        ),
        array(
            'name'=>$this->getFConfig('reset_col'),
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'RES'),
            'htmlOptions'=>array('align'=>'center'),
        ),
        array(
            'name'=>$this->getFConfig('greset_col'),
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'GR'),
            'htmlOptions'=>array('align'=>'center'),
        ),
        array(
            'name'=>'Guild',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Guild'),
            'type'=>'raw',
            'value'=>'$data->getCGuild($data->Name)',
            'htmlOptions'=>array('align'=>'center'),
        ),
        array(
            'name'=>'Logo',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Logo'),
            'type'=>'raw',
            'value'=>'$data->getGLogo($data->getCGuild($data->Name),16)',
            'htmlOptions'=>array('align'=>'center'),
        ),
        array(
            'name'=>'MapNumber',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Location'),
            'type'=>'raw',
            'value'=>'$this->getMap($data->MapNumber)',
            'htmlOptions'=>array('align'=>'center'),
        )
    )));
?>
<div class="upd-time">
    <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Last updated').': '.News::getDate(date("d M Y -.H:i",time()));?>
</div>


