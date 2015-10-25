<?php
class AboutController extends FrontEndController
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

    public function actionView($url)
    {
        $this->render('about_sidebar',array(
            'model'=>$this->loadModel($url),
        ));
    }

    public function actionIndex()
    {
        $model = FAI_ABOUT::model()->find(array(
            'select'=>'title, description, meta_key, meta_desc',
            'condition'=>'status=:status AND onmpage=:onmpage',
            'params'=>array(':status'=>1, ':onmpage'=>1),
        ));

        $this->pageTitle = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'About Project').' / '.
            $this->getFConfig('serverName');

        $this->pageH1 = $model->title;

        $this->breadcrumbs=array(
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'About Project'),
            $model->title
        );

        Yii::app()->clientScript->registerMetaTag($model->meta_desc, 'description');
        Yii::app()->clientScript->registerMetaTag($model->meta_key, 'keywords');

        $this->render('index',array(
            'model'=>$model
        ));
    }
}
