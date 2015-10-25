<?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider'=>$links,
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
                'name'=>'title',
                'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Title'),
            ),
            array(
                'name'=>'description',
                'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Description'),
            ),
            array(
                'name'=>'link',
                'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Link'),
                'type'=>'raw',
                'value'=>'CHtml::link(Yii::t(Yii::app()->request->cookies["language"]->value, "Download"),"$data->link", array("target"=>"_blank", "class"=>"dwn-link"))',
                'htmlOptions'=>array('align'=>'center'),
            ),

        )));
?>