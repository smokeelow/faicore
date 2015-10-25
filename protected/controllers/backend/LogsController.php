<?php

class LogsController extends BackEndController
{
    public function actionIndex()
    {
        $reportArray = array_slice(scandir('protected/log'),2);

        $this->pageTitle=Yii::app()->getFConfig('serverName').' / '.
           Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel').' / '.
           Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Logs'). ' / '.
           Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'List of logs');

        $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Logs');

        $this->render('index',array(
           'reportArray'=>$reportArray
        ));
    }

    public function actionDownload($name)
    {
        Yii::app()->request->sendFile($name,file_get_contents('protected/log/'.$name));
        $this->redirect(array('index'));
    }

    public function actionReg($name='')
    {
        $this->logBody($name,Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'List of registered users'),'REG_USERS');
    }

    public function actionError($name='')
    {
        $this->logBody($name,Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'List of errors'),'ERROR_REPORT');
    }


    public function logBody($name='',$title,$type)
    {
        if($name != '')
        {
            $filePath = 'protected/log/'.$name;
        }
        else
        {
            $filePath = 'protected/log/'.Yii::app()->request->cookies['language']->value.'_FRONT_'.date('d_m_Y').'_'.$type.'.txt';
        }

        if(file_exists($filePath))
        {
            $reportArray = file($filePath);

            if(!empty($reportArray))
            {
                $nameArray = explode("_",$filePath);

                $this->pageTitle=Yii::app()->getFConfig('serverName').' / '.
                    Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel').' / '.
                    Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Logs'). ' / '.$title.' '.
                    Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'for').' '.$nameArray['2'].'.'.$nameArray['3'].'.'.$nameArray['4'].' / '.
                    $nameArray['1'].'END';

                $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Logs').' / '.$title.' '.
                    Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'for').' '.$nameArray['2'].'.'.$nameArray['3'].'.'.$nameArray['4'].' / '.
                    $nameArray['1'].'END';

                $this->render('index',array(
                    'reportArray'=>$reportArray
                ));
            }
        }
        else
        {
            Yii::app()->user->setFlash('delete', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Log file does not exist'));
            $this->redirect(array('index'));
        }
    }

    public function actionDelete($name)
    {
        unlink('protected/log/'.$name);

        Yii::app()->user->setFlash(
            'success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'File').
            " <b>".$name."</b> ".
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been')." ".
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'successfully deleted')
        );

        $this->redirect(array('index'));
    }
}
