<?php
$this->pageTitle=Yii::app()->name . ' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Career').' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Page list').'';

?>

<div class="wrapper">
    <div class="page-title">
        <h1><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Career')?></h1>
    </div>
</div>

<div class="divider"></div>


    <div class="t-h-row">
        <div class="wrapper">
            <ul>
                <li><?php echo CHtml::link('<img src="/skin/backend/images/resume.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add new page').'"/><span>'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add new page').'</span>', 'career/create') ?></li>
            </ul>
        </div>
    </div>

<div class="divider"></div>

    <div class="wrapper">
        <?php
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {
            echo '<ul class="core-messages">';
            foreach($flashMessages as $key => $message) {
                echo '<li><div class="flash-' . $key . '">
                        <p>' . $message . "</p>
                    </div></li>\n";
            }
            echo '</ul>';
        }
        ?>
    </div>

<div class="wrapper">
    <div class="widget">
            <div class="title">
                <img class="t-icon" src="/skin/backend/faicore/images/list.png" />
                <h6><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Page list')?></h6>
            </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="fai-table">
            <thead>
            <tr>
                <td width="22px">#</td>
                <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Title')?></td>
                <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'URL')?></td>
                <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Main of "Career"')?></td>
                <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Status')?></td>
                <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Actions')?></td>
            </tr>
            </thead>

            <tbody>

                    <?php $this->widget('zii.widgets.CListView', array(
                        'dataProvider'=>$dataProvider,
                        'itemView'=>'_view',
                            'summaryText'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'On page').' {start} - {end} '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'of').' {count}',
                            'pager' => Array(
                                'header' => '',
                                'prevPageLabel' => '<',
                                'nextPageLabel' => '>',
                            ),
                    )); ?>

            </tbody>
        </table>

    </div>
</div>

