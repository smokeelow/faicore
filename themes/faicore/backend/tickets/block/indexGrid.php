<?php //Yii::app()->clientScript->scriptMap=array(
//
//    'jquery.js'=>false,
//
//)?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$model,
    'htmlOptions' => array('class' => 'fai-table'),
    'summaryText'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'On page').' {start} - {end} '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'of').' {count}',
    'selectableRows'=>2,
    'pager'=>array(
        'header'         => '',
        'firstPageLabel' => '&lt;&lt;',
        'prevPageLabel'  => '<',
        'nextPageLabel'  => '>',
        'lastPageLabel'  => '&gt;&gt;',
    ),
    'columns'=>array(
        array(
            'name'=>'id',
            'value'=>'"#".$data->id',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'ID'),
            'htmlOptions'=>array('width'=>'24px','align'=>'center'),
        ),
        array(
            'name'=>'topic',
            'value'=>'News::strCut($data->topic)',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Topic'),
            'htmlOptions'=>array('width'=>'28%'),
        ),
        array(
            'name'=>'memb___id',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Account'),
            'htmlOptions'=>array('align'=>'center'),
        ),
        array(
            'name'=>'character',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Character'),
            'htmlOptions'=>array('align'=>'center'),
        ),
        array(
            'name'=>'date',
            'value'=>'News::getDate(date("d M Y -.H:i",$data->date))',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Date'),
            'htmlOptions'=>array('align'=>'center'),
        ),
        array(
            'name'=>'ip',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'IP Address'),
            'htmlOptions'=>array('align'=>'center'),
        ),
        array(
            'class'=>'DataColumn',
            'name'=>'status',
            'value'=>'$data->getStatus($data->status,"word")',
            'type'=>'raw',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Status'),
            'evaluateHtmlOptions'=>true,
            'htmlOptions'=>array('width'=>'60','align'=>'center', 'class'=>'"{$data->getStatus($data->status,"css")}"'),
        ),
        array(
            'class'=>'DataColumn',
            'name'=>'priority',
            'value'=>'$data->getPriority($data->priority,"word")',
            'type'=>'raw',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Priority'),
            'evaluateHtmlOptions'=>true,
            'htmlOptions'=>array('align'=>'center', 'class'=>'"{$data->getPriority($data->priority,"css")}"', 'width'=>'"2px"'),
        ),
        array(
            'name'=>'actions',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Actions'),
            'value'=>'CHtml::link(CHtml::image(Yii::app()->getTemplate("backend")."images/magnify.png", "view"), array("view", "id"=>$data->id),array("class" => "s-button", "title"=>Yii::t("".Yii::app()->request->cookies["language"]->value."", "View")))."
            ".CHtml::link(CHtml::image(Yii::app()->getTemplate("backend")."images/close.png", "delete"), array("delete", "id"=>$data->id),array("class" => "s-button", "title"=>Yii::t("".Yii::app()->request->cookies["language"]->value."", "Delete")))',
            'type'=>'raw',
            'htmlOptions'=>array('align'=>'center', 'width'=>'83px'),

        ),
    )));
?>