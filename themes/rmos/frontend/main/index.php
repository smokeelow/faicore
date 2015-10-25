<div id="news">

    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'template'=>'{items} {pager}',
        'itemView'=>'news/_all_news',
    )); ?>

</div>



