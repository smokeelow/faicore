<?php
class MainController extends FrontEndController
{
    public $layout ='//layouts/mainPage';

    public function filters()
    {
        return array(
            array(
                'COutputCache + index + files + online',
                'duration'=>600,
                'varyByExpression'=>Yii::app()->request->cookies['language']->value.Yii::app()->request->cookies['server']->value.Yii::app()->user->isGuest,
            ),
        );
    }

	public function actionIndex()
	{
        $cookie = new CHttpCookie('language', ''.Yii::app()->language.'');
        $cookie->expire = time() + (60*60*24*365);
        Yii::app()->request->cookies['language'] = $cookie;

        $this->pageTitle = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Home').' / '
            .Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'News').' / '.
            $this->getFConfig('serverName');

        $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'News');

        $this->breadcrumbs=array(
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Home'),
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'News')
        );

        Yii::app()->clientScript->registerMetaTag($this->getFConfig('metaDesc'), 'description');
        Yii::app()->clientScript->registerMetaTag($this->getFConfig('metaKey'), 'keywords');

        $criteria = new CDbCriteria();

        $criteria->condition = 'active=:active';
        $criteria->select = 'img, title, url, s_desc, date, author';
        $criteria->params = array(':active'=>'1');
        $criteria->order  = 'id DESC';
        $dataProvider=new CActiveDataProvider('News', array('criteria'=>$criteria));

        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
	}

    public function actionView($url)
    {
        $model  = $this->loadModel($url);
        $this->pageTitle = $model->title.' / '.
            $this->getFConfig('serverName');

        $this->breadcrumbs=array(
            $model->title,
        );

        $this->pageH1 = $model->title;

        Yii::app()->clientScript->registerMetaTag($model->meta_desc, 'description');
        Yii::app()->clientScript->registerMetaTag($model->meta_key, 'keywords');

        $this->render('news/view',array(
            'model'=>$model,
        ));
    }

    public function loadModel($url)
    {
        $model = News::model()->findByAttributes(array('url'=>$url));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function actionFiles()
    {
        $links = array(
            $this->getFConfig('clientDown'),
            $this->getFConfig('clientDown_1'),
            $this->getFConfig('clientDown_2'),
            $this->getFConfig('clientDown_3'),
            $this->getFConfig('clientDown_4'),
            $this->getFConfig('clientDown_5'),
        );

        $model = new CActiveDataProvider('Files');

        $count = 1;

        $this->pageTitle = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Files').' / '
            .$this->getFConfig('downTitle').' / '.
            $this->getFConfig('serverName');

        $this->breadcrumbs=array(
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Files'),
            $this->getFConfig('downTitle')
        );

        $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Files');

        Yii::app()->clientScript->registerMetaTag($this->getFConfig('metaDescDown'), 'description');
        Yii::app()->clientScript->registerMetaTag($this->getFConfig('metaKeyDown'), 'keywords');

        $this->render('files',array(
            'links'=>$model,
            'count'=>$count
        ));
    }

    public function actionOnline()
    {
        $i=0;

        $onlineArray = MEMBSTAT::model()->findAll(array(
            'select'=>'memb___id',
            'condition'=>'ConnectStat=:ConnectStat',
            'params'=>array(':ConnectStat'=>'1')
        ));

        $model = new Character;
        $this->pageTitle = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Total online').' / '.
            $this->getFConfig('serverName');

        $this->breadcrumbs=array(
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Total online')
        );

        $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Total online');

        Yii::app()->clientScript->registerMetaTag($this->getFConfig('metaDescDown'), 'description');
        Yii::app()->clientScript->registerMetaTag($this->getFConfig('metaKeyDown'), 'keywords');


        $this->render('online',array('onlineArray'=>$onlineArray,'i'=>$i,'model'=>$model));
    }

    public function actionForum()
    {
        $this->redirect($this->getFConfig('forumURL'));
    }

    public function actionAjax($id)
    {
        switch($id)
        {
            case 'loginpanel'   : $result = $this->getLoginPanel();     break;
            case 'sidebar'      : $result = $this->getSideBar();        break;
        }

        return $result;
    }

    private function getLoginPanel()
    {
        $this->renderPartial('blo/login');
    }

    private function getSideBar()
    {
        $this->renderPartial('block/sidebar');
    }
}