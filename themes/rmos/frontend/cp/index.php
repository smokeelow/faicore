<?php $dataProvider->getPagination()->pageVar = 'page';?>
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'template'=>'{items} {pager}',
    'itemView'=>'block/news',
    'ajaxUpdate'=>false,
    'pager'=>array(
        'header'         => '',
        'firstPageLabel' => '&lt;&lt;',
        'prevPageLabel'  => '<',
        'nextPageLabel'  => '>',
        'lastPageLabel'  => '&gt;&gt;',
    ),
)); ?>