<?php
return CMap::mergeArray(
    include(dirname(__FILE__).'/main.php'),
    array(
        'defaultController' => 'main',
        'theme'=>$this->getFConfig('b_theme'),

        'import'=>array(
            'application.models.backend.*',
            'application.components.backend.*',
        ),

        'components'=>array(
            'user'=>array(
                'loginUrl'=>array('login'),
                'class' => 'WebUser',
                ),

            'request'=>array(
//            'enableCookieValidation'=>true,
                'enableCsrfValidation'=>false,
            ),

            'authManager' => array(
                'class' => 'PhpAuthManager',
                'defaultRoles' => array('guest'),
            ),

            'urlManager'=>array(
                'class'=>'application.components.backend.UrlManager',
                'urlFormat'=>'path',
                'showScriptName'=>false,
                'rules'=>array(
                    'admin/<language:(ru|uk|en|lv)>/<server:('.$servers.')>'=>'main/index',
                    'admin'=>'main/index',
                    'admin/<language:(ru|uk|en|lv)>/<server:('.$servers.')>/login'=>'main/entrance',
                    'admin/<language:(ru|uk|en|lv)>/<server:('.$servers.')>/<controller:\w+>'=>'<controller>/index',
                    'admin/<language:(ru|uk|en|lv)>/<server:('.$servers.')>/main/captcha/*'=>'main/captcha',
                    'admin/<language:(ru|uk|en|lv)>/<server:('.$servers.')>/category/<action:\w+>/<url>'=>'/category/<action>',
                    'admin/<language:(ru|uk|en|lv)>/<server:('.$servers.')>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                    'admin/<language:(ru|uk|en|lv)>/<server:('.$servers.')>/users/lockchar/*'=>'users/lockchar',
                    'admin/<language:(ru|uk|en|lv)>/<server:('.$servers.')>/users/unlockchar/*'=>'users/unlockchar',
                    'admin/<language:(ru|uk|en|lv)>/<server:('.$servers.')>/logs/<action:\w+>/*'=>'/logs/<action>',
                    'admin/<language:(ru|uk|en|lv)>/<server:('.$servers.')>/<controller:\w+>/<id:\d+>/*'=>'<controller>/view',
                    'admin/<language:(ru|uk|en|lv)>/<server:('.$servers.')>/<controller:\w+>/<action:\w+>/<alias>'=>'/<controller>/<action>',
                    'admin/<language:(ru|uk|en|lv)>/<server:('.$servers.')>/<controller:\w+>/<action:\w+>/<alias>'=>'/<controller>/<action>',
                    'admin/<language:(ru|uk|en|lv)>/<server:('.$servers.')>/<_c>'=>'<_c>',
                    'admin/<language:(ru|uk|en|lv)>/<server:('.$servers.')>/<_c>/<_a>'=>'<_c>/<_a>',
                ),
            ),

            'browser' => array(
                'class' => 'application.extensions.Browser.CBrowserComponent',
            ),

            'errorHandler'=>array(
                'errorAction'=>'core/error',
                'discardOutput' => false,
            ),

            'mailer'=>array(
                'pathViews' => 'application.views.backend.email',
                'pathLayouts' => 'application.views.email.backend.layouts'
            ),

        ),

        'params'=>array(
            'languages'=>array('en'=>'English', 'ru'=>'Русский'),
        ),
    )
);