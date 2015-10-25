<?php

class StatisticsController extends FrontEndController
{
    public $layout='//layouts/mainPage';

    public function filters()
    {
        return array(
            array(
                'COutputCache',
                'duration'=>600,
                'varyByExpression'=>Yii::app()->request->cookies['language']->value.Yii::app()->request->cookies['server']->value.Yii::app()->user->isGuest,
            ),
        );
    }

    public function actionIndex()
    {
        $this->pageTitle = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Statistics').' / '.
            $this->getFConfig('serverName');

        $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Statistics');

        $this->breadcrumbs=array(
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Statistics'),
        );

        Yii::app()->clientScript->registerMetaTag(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Statistics').' '.$this->getFConfig('serverName'), 'description');
        Yii::app()->clientScript->registerMetaTag(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Statistics').','
            .$this->getFConfig('serverName'), 'keywords');

        $this->render('index');
    }
}
