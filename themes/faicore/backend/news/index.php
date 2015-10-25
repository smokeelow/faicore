<?php
$this->pageTitle=Yii::app()->getFConfig('serverName') .' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel').' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'News').' / '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'News list').'';
?>

<div class="wrapper">
    <div class="page-title">
        <h1><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'News')?></h1>
    </div>
</div>

<div class="divider"></div>


    <div class="t-h-row">
        <div class="wrapper">
            <ul>
                <li><?php echo CHtml::link('<img src="'.$this->getTemplate('backend').'images/add_new.png" alt="'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add news').'"/><span>'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add news').'</span>', 'news/create') ?></li>
            </ul>
        </div>
    </div>

<div class="divider"></div>

<div class="get-space"></div>

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
            <img class="t-icon" src="<?php echo $this->getTemplate('backend');?>images/list.png" />
            <h6><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'News list')?></h6>
        </div>

        <?php echo $this->renderPartial('block/indexGrid', array('model'=>$model));?>
    </div>
</div>

