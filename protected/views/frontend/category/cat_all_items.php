<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$pages,
    'itemView'=>'_view_cat',
    'ajaxUpdate'=>false,
    'summaryText'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'On page').' {start} - {end} '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'of').' {count}',
    'pager' => Array(
        'header' => '',
        'prevPageLabel' => '<',
        'nextPageLabel' => '>',
    ),
)); ?>


