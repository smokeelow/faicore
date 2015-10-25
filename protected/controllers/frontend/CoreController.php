<?php

class CoreController extends FrontEndController
{
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(!is_dir('protected/log')) {mkdir('protected/log');chmod("log", 0755);}
                file_put_contents('protected/log/'.Yii::app()->request->cookies['language']->value.'_FRONT_'.date('d_m_Y').'_ERROR_REPORT.txt',
                        Yii::app()->request->requestUri."\t".
                        $error['code']."\t".
                        $error['message']."\t".
                        date('d.m.Y H:i:s')."\t".
                        Yii::app()->request->userHostAddress."\t".
                        Yii::app()->browser->getBrowser()."\t".
                        Yii::app()->browser->getVersion()."\t".
                        Yii::app()->browser->getPlatform()."\t".
                        $_SERVER['HTTP_USER_AGENT']."\n",
                    FILE_APPEND);

            if(Yii::app()->request->isAjaxRequest)
            {
                echo $error['message'];
            }
            else
            {
                $this->pageTitle=$this->getFConfig('serverName') . ' / '.
                    Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Error').' / '.
                    $error['code'];
                $this->layout = 'error';
                $this->render('error', $error);
            }
        }
    }
}