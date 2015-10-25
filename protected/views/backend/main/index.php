<?php
    $this->pageTitle=Yii::app()->name .' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel').' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Home');
?>

<div class="wrapper">
    <div class="page-title">
        <h1><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel')?></h1>
    </div>
</div>

<div class="divider"></div>

<div class="t-h-row">
    <div class="wrapper">
        <ul>
            <li><?php echo CHtml::link('<img src="/skin/backend/images/slides_stack.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add set of slides').'"/><span>'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add set of slides').'</span>', 'main/create') ?></li>
            <li><?php echo CHtml::link('<img src="/skin/backend/images/accessories-text-editor.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add announcement').'"/><span>'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add announcement').'</span>', 'main/create-announcement') ?></li>
            <li>
                <?php
                    if (Yii::app()->user->role == "super-administrator")
                        echo CHtml::link('<img src="/skin/backend/images/n-user.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add user').'"/><span>'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add user').'</span>', 'main/create-user');
                ?>
            </li>
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
            <img class="t-icon" src="/skin/backend/faicore/images/sslides.png" />
            <h6><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'List of a set slides')?></h6>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="fai-table">
            <thead>
                <tr>
                    <td width="22">#</td>
                    <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Set name')?></td>
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

    <div class="clear-space"></div>

    <div class="widget">
        <div class="title">
            <img class="t-icon" src="/skin/backend/faicore/images/dialog.png" />
            <h6><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'List of announcements')?></h6>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="fai-table">
            <thead>
                <tr>
                    <td width="22">#</td>
                    <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Title')?></td>
                    <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'URL')?></td>
                    <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Image')?></td>
                    <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Status')?></td>
                    <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Actions')?></td>
                </tr>
            </thead>

            <tbody>

            <?php $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$noticeProvider,
                'itemView'=>'notice/_notice_view',
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

    <div class="clear-space"></div>

    <div class="widget">
        <div class="title">
            <img class="t-icon" src="/skin/backend/faicore/images/u-grid.png" />
            <h6><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'List of users')?></h6>
        </div>
        <table id="usr-tbl" cellpadding="0" cellspacing="0" width="100%" class="fai-table">
            <thead>
                <tr>
                    <td width="22">#</td>
                    <td width="55"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Avatar')?></td>
                    <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Name')?></td>
                    <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Account')?></td>
                    <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Status')?></td>
                    <td><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Actions')?></td>
                </tr>
            </thead>

            <tbody>

            <?php $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$userProvider,
                'itemView'=>'users/_user_view',
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
<div class="clear"></div>
</div>