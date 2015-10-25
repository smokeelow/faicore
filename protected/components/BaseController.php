<?php

class BaseController extends CController
{
    public $pageH1;
    public function setNotice($message)
    {
        return Yii::app()->user->setFlash('notice', $message);
    }


    public function setError($message)
    {
        return Yii::app()->user->setFlash('error', $message);
    }

}
