<?php
class PaymentController extends BackEndController
{
    public function actionIndex()
    {
        $fconfig = new FConfig();

        $this->performAjaxValidation($fconfig);

        if(isset($_POST['FConfig']))
            $this->updateINI($_POST['FConfig'], $fconfig);

        $this->pageTitle=Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Payment Methods').' / '.
            Yii::app()->getFConfig('serverName').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel');

        $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Payment Methods');

        $this->render('index',array('fconfig'=>$fconfig));
    }

    public function actionInterkassa()
    {
        $fconfig = new FConfig();

        $this->performAjaxValidation($fconfig);

        if(isset($_POST['FConfig']))
            $this->updateINI($_POST['FConfig'], $fconfig);

        $this->pageTitle=Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Interkassa').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Payment Methods').' / '.
            Yii::app()->getFConfig('serverName').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel');

        $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Payment Methods').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Interkassa');

        $this->render('index',array('fconfig'=>$fconfig));
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='config-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}