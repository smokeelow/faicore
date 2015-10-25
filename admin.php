<?php
if(!isset($_COOKIE['language'])) $_COOKIE['language'] = 'ru';
if(!isset($_COOKIE['server'])) $_COOKIE['server'] = 'rmos';

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

include_once(dirname(__FILE__).'/framework/yiilite.php');
Yii::createWebApplication(dirname(__FILE__).'/protected/config/backend.php')->runEnd('backend');