<?php if($this->beginCache('topGuild', array(
    'varyByExpression'=>Yii::app()->request->cookies['language']->value.Yii::app()->request->cookies['server']->value,
    'duration'=>600,
    'varyByRoute' => false))) { ?>

<?php echo $this->renderPartial('html/menu');?>

<?php
    $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$all,
    'htmlOptions' => array('class' => 'fai-table'),
    'summaryText' => '',
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
            'header' => '№',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
            'htmlOptions'=>array('align'=>'center', 'width'=>'10%'),
        ),
        array(
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Guild'),
            'type'=>'raw',
            'value'=>'$data->getGLogo($data->G_Name,20)."  ".$data->G_Name',
            'htmlOptions'=>array('width'=>'30%', 'align'=>'center'),
        ),
        array(
            'name'=>'MCount',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Member count'),
            'type'=>'raw',
            'value'=>'count($data->members)',
            'htmlOptions'=>array('align'=>'center'),
        ),
        array(
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Score'),
            'value'=>'$data->G_Score',
            'htmlOptions'=>array('align'=>'center'),
        )

    )));
?>

<?php $this->endCache(); } ?>

