<?php $this->beginContent('//layouts/cpLogin'); ?>
    <div id="login-content">
        <?php
            $flashMessages = Yii::app()->user->getFlashes();
            if ($flashMessages)
            {
                echo '<ul class="core-messages">';
                foreach($flashMessages as $key => $message)
                {
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