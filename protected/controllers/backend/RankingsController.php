<?php
class RankingsController extends BackEndController
{
    public function actionIndex()
    {
        $fconfig = new FConfig();

        $this->performAjaxValidation($fconfig);

        if(isset($_POST['FConfig']))
            $this->updateINI($_POST['FConfig'], $fconfig);

        $this->pageTitle= Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Rankings').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel');

        $this->render('index', array('fconfig'=>$fconfig));
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