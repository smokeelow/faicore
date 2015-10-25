<?php $this->beginContent('//layouts/main'); ?>

    <h1 class="pagetitle"><?php echo $this->pageH1;?></h1>
    <?php echo $this->renderPartial('../layouts/html/breadcrumbs');?>

    <div id="main-content">
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

        <?php echo $content; ?>
    </div>

<?php $this->endContent(); ?>