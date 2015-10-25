<?php
if(!isset($_COOKIE['server']))
{
    $urlString = explode('/',$_SERVER['REQUEST_URI']);
    $_COOKIE['server'] = $urlString['3'];
}

return CMap::mergeArray(
    include(dirname(__FILE__).'/main.php'),
    array(
        'defaultController' => 'main',
        'theme'=>$this->getFConfig('f_theme'),
        'import'=>array(
            'application.models.frontend.*',
            'application.components.frontend.*',
        ),

        'components'=>array(

            'user'=>array(
                'loginUrl'=>'/cp/login',
            ),

            'urlManager'=>array(
                'class'=>'application.components.frontend.UrlManager',
                'urlFormat'=>'path',
                'showScriptName'=>false,
                'rules'=>array(
                    '<controller:\w+>/<language:(ru|en)>/<server:('.$servers.')>' => '<controller>/index',
                    'main/<language:(ru|en)>/<server:('.$servers.')>/news/view/<url>'=>'main/view',
                    'about/<language:(ru|en)>/<server:('.$servers.')>/<url>'=>'about/view',
                    'cp/<language:(ru|en)>/<server:('.$servers.')>/report'=>'cp/report',
                    'cp/<language:(ru|en)>/<server:('.$servers.')>/report/view/<id:\d+>'=>'cp/view',
                    '<controller:\w+>/<language:(ru|en)>/<server:('.$servers.')>/<action:\w+>/<id>'=>'<controller>/<action>',
                    '<controller:\w+>/<language:(ru|en)>/<server:('.$servers.')>/<action:\w+>'=>'<controller>/<action>',
                ),
            ),

            'errorHandler'=>array(
                'errorAction'=>'core/error',
                'discardOutput' => false,
            ),

            'browser' => array(
                'class' => 'application.extensions.Browser.CBrowserComponent',
            ),

            'mailer'=>array(
                'pathViews' => 'application.views.frontend.email',
                'pathLayouts' => 'application.views.email.frontend.layouts'
            ),
        ),

        'params'=>array(
            'languages'=>array('en'=>'English','ru'=>'Русский'),
        ),
    )
);