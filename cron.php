<?php
include_once(dirname(__FILE__).'/index.php');

$main  = file_get_contents(Yii::app()->getFConfig('webURL').Yii::app()->createUrl('main/index'));
$about = file_get_contents(Yii::app()->getFConfig('webURL').Yii::app()->createUrl('about/index'));
$files = file_get_contents(Yii::app()->getFConfig('webURL').Yii::app()->createUrl('main/files'));
$rankings = file_get_contents(Yii::app()->getFConfig('webURL').Yii::app()->createUrl('rankings/index'));
$guilds = file_get_contents(Yii::app()->getFConfig('webURL').Yii::app()->createUrl('rankings/guilds'));
$reg = file_get_contents(Yii::app()->getFConfig('webURL').Yii::app()->createUrl('registration/index'));
unset($main);unset($about);unset($files);unset($rankings);unset($guilds);unset($reg);



