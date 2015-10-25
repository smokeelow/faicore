<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view_latest',
    'ajaxUpdate'=>false,
    'summaryText'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'On page').' {start} - {end} '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'of').' {count}',
    'pager' => Array(
        'header' => '',
        'prevPageLabel' => '<',
        'nextPageLabel' => '>',
    ),
)); ?>



