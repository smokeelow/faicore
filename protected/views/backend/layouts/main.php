<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/skin/backend/css/style.css" />
    <script src="/skin/backend/faicore/js/jquery.1.8.js"></script>
    <script src="/skin/backend/faicore/js/selectbox.js"></script>
    <script src="/skin/backend/faicore/js/tooltip.js"></script>
    <script src="/skin/backend/faicore/js/core.js"></script>
   <?php Yii::app()->clientScript->scriptMap=array(

    'jquery.js'=>false,

    )?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>


</head>

<body>

<div id="left-side">
    <div id="sidebar">
        <div id="c-logo">
            some logo
        </div>


        <div class="sep-line"></div>
            <?php
                $this->widget('application.components.backend.widgets.LanguageSelector');
            ?>
        <div class="sep-line"></div>
        <?php
        $this->widget('zii.widgets.CMenu',array(
            'htmlOptions'=>array('class'=>'nav'),
            'items'=>array(
                array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Home').'',         'url'=>array('/main/index'),'itemOptions'=>array('class'=>'home'), 'active' => Yii::app()->controller->getId() == 'main', 'visible'=>Yii::app()->getUser()->checkAccess('administrator') || Yii::app()->getUser()->checkAccess('moderator') || Yii::app()->getUser()->checkAccess('super-administrator')),
                array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Press').'',        'url'=>array('/news/index'), 'itemOptions'=>array('class'=>'news') , 'active' => Yii::app()->controller->getId() == 'news', 'visible'=>Yii::app()->getUser()->checkAccess('administrator') || Yii::app()->getUser()->checkAccess('moderator') || Yii::app()->getUser()->checkAccess('journalist') || Yii::app()->getUser()->checkAccess('super-administrator')),
                array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Category').'',     'url'=>array('/category/index'), 'itemOptions'=>array('class'=>'category') , 'active' => Yii::app()->controller->getId() == 'category', 'visible'=>Yii::app()->getUser()->checkAccess('administrator') || Yii::app()->getUser()->checkAccess('moderator') || Yii::app()->getUser()->checkAccess('super-administrator')),
                array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Pages').'',        'url'=>array('/pages/index'), 'itemOptions'=>array('class'=>'pages') , 'active' => Yii::app()->controller->getId() == 'pages', 'visible'=>Yii::app()->getUser()->checkAccess('administrator') || Yii::app()->getUser()->checkAccess('moderator') || Yii::app()->getUser()->checkAccess('moderator') || Yii::app()->getUser()->checkAccess('super-administrator')),
                array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Career').'',       'url'=>array('/career/index'), 'itemOptions'=>array('class'=>'career'), 'active' => Yii::app()->controller->getId() == 'career', 'visible'=>Yii::app()->getUser()->checkAccess('administrator') || Yii::app()->getUser()->checkAccess('moderator') || Yii::app()->getUser()->checkAccess('super-administrator')),
                array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'About Us').'',     'url'=>array('/about/index'), 'itemOptions'=>array('class'=>'about'), 'active' => Yii::app()->controller->getId() == 'about', 'visible'=>Yii::app()->getUser()->checkAccess('administrator') || Yii::app()->getUser()->checkAccess('moderator') || Yii::app()->getUser()->checkAccess('super-administrator')),
                array('label'=>''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Contacts').'',     'url'=>array('/contacts/index'), 'itemOptions'=>array('class'=>'contact'), 'active' => Yii::app()->controller->getId() == 'contacts', 'visible'=>Yii::app()->getUser()->checkAccess('administrator') || Yii::app()->getUser()->checkAccess('moderator') || Yii::app()->getUser()->checkAccess('super-administrator')),
            ),
        )); ?>

    </div>
</div>

<div id="right-side">
    <div id="header">

        <div id="u-holder">
            <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Welcome')?>, <?php echo Yii::app()->user->name;?> !</span>


        </div>

        <div id="h-user">
            <ul>
                <li>

                </li>
                <li>
                    <a href="/admin/<?php echo Yii::app()->request->cookies['language']->value; ?>/main/update-user/<?php echo Yii::app()->user->username; ?>">
                        <img src="/skin/backend/faicore/images/profile.png" alt="Profile"/>
                        <span class="t-l-item"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Profile') ?></span>
                    </a>
                </li>
                <li>
                    <?php
                        echo CHtml::link('
                            <img src="/skin/backend/images/logout.png" alt="Logout"/>
                            <span class="t-l-item">'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Logout').'</span>
                            ', ('/admin/'.Yii::app()->request->cookies['language']->value.'/main/logout')
                        );
                    ?>
                </li>
            </ul>
        </div>
    </div>

        <div id="m-r-content">
            <?php echo $content; ?>
        </div>
</div>

</body>
</html>
