<?php
    $this->pageTitle=Yii::app()->name;
?>

<div id="main-page-form">

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

    <?php echo $this->renderPartial('upload_form', array('model'=>$model)); ?>

    <div class="clear"></div>
</div>
