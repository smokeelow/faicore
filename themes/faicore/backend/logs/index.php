<div class="wrapper">
    <div class="page-title">
        <h1><?php echo $this->pageH1;?></h1>
    </div>
</div>

<div class="divider"></div>

<div class="t-h-row">
    <div class="wrapper">
        <?php echo $this->renderPartial('html/menu');?>
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

<?php $count = 0; echo $this->renderPartial('block/'.Yii::app()->controller->action->id,array('reportArray'=>$reportArray, 'count'=>$count)); ?>



