<?php
$flashMessages = Yii::app()->user->getFlashes();
if ($flashMessages)
{
    echo '<ul id="core-messages" class="core-messages">';
    foreach($flashMessages as $key => $message)
    {
        echo '<li><div class="flash-' . $key . '">
                            <p>' . $message . "</p>
                        </div></li>\n";
    }
    echo '</ul>';
}
?>