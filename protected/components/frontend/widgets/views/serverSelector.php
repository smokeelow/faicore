<div id="server-select">
    <?php
    if(sizeof($servers) <= 1) { // если языков меньше четырех - отображаем в строчку
//        // Если хотим видить в виде флагов то используем этот код
//        foreach($servers as $key=>$lang) {
//            if($key != $currentServer) {
//                echo CHtml::link(
//                    '<img src="/images/'.$key.'.gif" title="'.$lang.'" style="padding: 1px;" width=16 height=11>',
//                    $this->getOwner()->createMultilanguageReturnUrl($key));                };
//        }
        // Если хотим в виде текста то этот код

        $lastElement = end($servers);
        foreach($servers as $key=>$lang) {
            if($key != $currentServer) {
                echo CHtml::link(
                     $lang,
                     $this->getOwner()->createMultilanguageReturnUrl($key));
            } else echo '<b>'.$lang.'</b>';
            if($lang != $lastElement) echo ' | ';
        }

    }
    else {
        // Render options as dropDownList
        echo CHtml::form();
        foreach($servers as $key=>$lang) {
            echo CHtml::hiddenField(
                $key,
                $this->getOwner()->createMultilanguageReturnUrl(Yii::app()->request->cookies['language']->value,$lang));
        }
        echo CHtml::dropDownList('server', $currentServer, $servers,
            array(
                'class'=>'cat-select',
                'submit'=>'',
            )
        );
        echo CHtml::endForm();
    }
    ?>
</div>