<?php
/** @var $servers Faicore url string */
$servers = 'rmos';

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'charset' => 'UTF-8',
	'name'=>'Faicore',

    'sourceLanguage'=>'en',
    'language'=>'ru',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.components.*',
	),

    'behaviors'=>array(
        'runEnd'=>array(
            'class'=>'application.behaviors.WebApplicationEndBehavior',
        ),
    ),

//    'onBeginRequest'=>create_function('$event', 'return ob_start("ob_gzhandler");'),
//    'onEndRequest'=>create_function('$event', 'return ob_end_flush();'),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'irwKLj4043jLK3j4:213N',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1', '213.111.125.170'),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>false,
		),

        'request'=>array(
//            'enableCookieValidation'=>true,
           'enableCsrfValidation'=>true,
        ),

		'db'=>$this->getDBConnect(),
        'db_1'=>$this->getSingleDBConnect('rmos'),
        'db_2'=>$this->getSingleDBConnect(),
        'db_3'=>$this->getSingleDBConnect(),

        'ipb'=>$this->getIpbDBConnect(),

        'cache'=>array(
            'class'=>'CApcCache'
        ),

        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName'=>false,
            'rules'=>array(
//                'gii'=>'gii',
            ),
        ),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	'params'=>array(
        'secCode'   => '743920252',
        'superCode' => '4071923856234059238456410789561023416462',
		'adminEmail'=>'smokeelow@gmail.com',
	),
);