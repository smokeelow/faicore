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
            'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
            'header'=>'№',
            'htmlOptions'=>array('width'=>'24px','align'=>'center'),
        ),
        array(
            'name'=>'name',
            'value'=>'$data->name',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Account'),
        ),
        array(
            'name'=>'name',
            'value'=>'$data->rname',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Name'),
            'htmlOptions'=>array('align'=>'center'),
        ),
        array(
            'name'=>'status',
            'value'=>'$data->getRoles("table",$data->status)',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Access status'),
            'htmlOptions'=>array('class'=>'status', 'align'=>'center'),
        ),
        array(
            'name'=>'actions',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Actions'),
            'value'=>'CHtml::link(CHtml::image(Yii::app()->getTemplate("backend")."images/edit.png", "update"), array("edit", "alias"=>$data->name),array("class" => "s-button", "title"=>Yii::t("".Yii::app()->request->cookies["language"]->value."", "Edit")))."
            ".CHtml::link(CHtml::image(Yii::app()->getTemplate("backend")."images/close.png", "delete"), array("delete", "alias"=>$data->name),array("class" => "s-button", "title"=>Yii::t("".Yii::app()->request->cookies["language"]->value."", "Delete")))',
            'type'=>'raw',
            'htmlOptions'=>array('align'=>'center', 'width'=>'83px'),
        ),
    )));
?>