<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$model->search(),
    'filter'=>$model,
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
            'header'=>'№',
            'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
            'filter'=>false,
            'htmlOptions'=>array('align'=>'center'),
        ),
        array(
            'name'=>'memb___id',
            'value'=>'$data->memb___id',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Account'),
        ),
        array(
            'name'=>'memb__pwd',
            'value'=>'$data->memb__pwd',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Password'),
        ),
        array(
            'name'=>'mail_addr',
            'value'=>'$data->mail_addr',
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'E-Mail'),
        ),
        array(
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Characters'),
            'value'=>'$data->getAChars($data->memb___id)'
        ),
        array(
            'header'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Actions'),
            'value'=>'CHtml::link(CHtml::image(Yii::app()->getTemplate("backend")."images/advancedsettings.png", "Send an mail"), array("profile", "id"=>$data->memb_guid),array("class" => "s-button", "onClick"=>"getModalWindow(this); return false;", "title"=>Yii::t("".Yii::app()->request->cookies["language"]->value."", "Settings")))."
            ".CHtml::link(CHtml::image(Yii::app()->getTemplate("backend")."images/close.png", "delete"), array("delete", "id"=>$data->memb___id),array("class" => "s-button", "title"=>Yii::t("".Yii::app()->request->cookies["language"]->value."", "Delete")))',
            'type'=>'raw',
            'htmlOptions'=>array('align'=>'center', 'width'=>'80'),
        ),
    )));
?>