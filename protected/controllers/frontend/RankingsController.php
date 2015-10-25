<?php
class RankingsController extends FrontEndController
{
    public $layout ='//layouts/mainPage';

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
        $criteria = new CDbCriteria;
        $criteria->select = 'AccountID, Name, cLevel, '.$this->getFConfig('reset_col').', '.$this->getFConfig('greset_col').', Class,MapNumber';
        $criteria->condition = 'CtlCode=:CtlCode';
        $criteria->order = ''.$this->getFConfig('greset_col').' DESC, '.$this->getFConfig('reset_col').' DESC, cLevel DESC';
        $criteria->limit = $this->getFConfig('top_chars');
        $criteria->params = array(':CtlCode'=>'0');

        $dataProvider = new CActiveDataProvider('Character', array('criteria'=>$criteria,
            'pagination' => false));

        $this->pageTitle = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Ranking')." / "
            .Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Character ranking')." / "
            .$this->getFConfig('chaRTitle').' / '.
            $this->getFConfig('serverName');

        $this->breadcrumbs=array(
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Ranking'),
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Character ranking')
        );

        $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Character ranking');

        Yii::app()->clientScript->registerMetaTag($this->getFConfig('metaDescChar'), 'description');
        Yii::app()->clientScript->registerMetaTag($this->getFConfig('metaKeyChar'), 'keywords');

        $this->render('characters',array(
            'all'=>$dataProvider,
        ));
	}

    public function actionGuilds()
    {
        $criteria = new CDbCriteria();
        $criteria->select = 'G_Name, G_Master, G_Score';

        $dataProvider = new CActiveDataProvider('Guild', array('criteria'=>$criteria,
            'sort'=>array('attributes'=>array('item1','item2','item3')),
            'pagination' => array('pageVar'=>'page', 'pageSize' => '50')));

        $this->pageTitle = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Ranking')." / "
            .Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Guild ranking')." / "
            .$this->getFConfig('gulRTitle').' / '.
            $this->getFConfig('serverName');

        $this->breadcrumbs=array(
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Ranking'),
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Guild ranking')
        );

        $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Guild ranking');

        Yii::app()->clientScript->registerMetaTag($this->getFConfig('metaDescGuild'), 'description');
        Yii::app()->clientScript->registerMetaTag($this->getFConfig('metaKeyGuild'), 'keywords');

        $this->render('guilds',array(
            'all'=>$dataProvider,
        ));
    }

    public function loadModel($url)
    {
        $model = News::model()->findByAttributes(array('url'=>$url));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}