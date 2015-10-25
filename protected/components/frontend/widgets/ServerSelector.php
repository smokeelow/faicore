<?php

class ServerSelector extends CWidget
{
    public function run()
    {
        $currentServer = Yii::app()->request->cookies['server']->value;
        $servers = parse_ini_file('protected/core_conf/servers_list_'.Yii::app()->request->cookies['language']->value.'.ini');
        $this->render('serverSelector', array('currentServer' => $currentServer, 'servers'=>$servers));
    }
}
