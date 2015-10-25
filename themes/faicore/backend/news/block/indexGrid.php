<?php //Yii::app()->clientScript->scriptMap=array(
//
//    'jquery.js'=>false,
//
//)?>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$model->search(),
    'id'=>'fai-table',
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
            'name'=>'title',
            'value'=>'$data->title',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Title'),
        ),
        array(
            'name'=>'date',
            'value'=>'News::getDate(date("d M Y -.H:i",$data->date))',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Date'),
            'htmlOptions'=>array('align'=>'center'),
        ),
        array(
            'name'=>'active',
            'value'=>'$this->getStatus($data->id,$data->active,"active","status")',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Status'),
            'htmlOptions'=>array('class'=>'status', 'align'=>'center'),
        ),
        array(
            'name'=>'actions',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Actions'),
            'value'=>'CHtml::link(CHtml::image(Yii::app()->getTemplate("backend")."images/edit.png", "update"), array("update", "id"=>$data->id),array("class" => "s-button", "title"=>Yii::t("".Yii::app()->request->cookies["language"]->value."", "Edit")))."
            ".CHtml::link(CHtml::image(Yii::app()->getTemplate("backend")."images/close.png", "delete"), array("delete", "id"=>$data->id),array("class" => "s-button", "title"=>Yii::t("".Yii::app()->request->cookies["language"]->value."", "Delete")))',
            'type'=>'raw',
            'htmlOptions'=>array('align'=>'center', 'width'=>'83px'),
        ),
    )));
?>