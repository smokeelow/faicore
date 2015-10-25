<div id="language-select">
    <?php
    if(sizeof($languages) <= 2)
    { // если языков меньше четырех - отображаем в строчку
//        // Если хотим видить в виде флагов то используем этот код
//        foreach($languages as $key=>$lang) {
//            if($key != $currentLang) {
//                echo CHtml::link(
//                    '<img src="'.Yii::app()->request->baseUrl.'/images/core/'.$key.'.png" title="'.$lang.'" style="padding: 1px;" width=16 height=11>',
//                    $this->getOwner()->createMultilanguageReturnUrl($key));                };
//        }
        // Если хотим в виде текста то этот код

        $lastElement = end($languages);
        foreach($languages as $key=>$lang)
        {
            if($key != $currentLang)
            {
                echo '<span class="lang-item">';
                    echo CHtml::link(
                        '<img src="'.Yii::app()->request->baseUrl.'/images/core/'.$key.'.png" title="'.$lang.'"> '.$lang,
                         $this->getOwner()->createMultilanguageReturnUrl($key));
                echo '</span>';
            }
            else
            {
                echo '<span class="lang-item"><img src="'.Yii::app()->request->baseUrl.'/images/core/'.$key.'.png" title="'.$lang.'"> '.$lang.'</span>';
            }

            if($lang != $lastElement) echo '  ';
        }
    }
    else
    {
        // Render options as dropDownList
        echo CHtml::form();
        foreach($languages as $key=>$lang)
        {
            echo CHtml::hiddenField(
                $key,
                $this->getOwner()->createMultilanguageReturnUrl($key));
        }
        echo CHtml::dropDownList('language', $currentLang, $languages,
            array(
                'submit'=>'',
            )
        );
        echo CHtml::endForm();
    }
    ?>
</div>