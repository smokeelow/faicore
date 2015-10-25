<?php
class MainController extends BackEndController
{
    private  $_identity;

	public function actionIndex()
	{
        $fconfig = new FConfig();

        $this->performAjaxValidation($fconfig);

        if(isset($_POST['FConfig']))
            $this->updateINI($_POST['FConfig'], $fconfig);

        $this->pageTitle=Yii::app()->getFConfig('serverName') .' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Home'). ' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Settings'). ' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'General');

        $this->render('index', array('fconfig'=>$fconfig));
	}

    public function actionDatabase()
    {
        $fconfig = new FConfig();

        $this->performAjaxValidation($fconfig);

        if(isset($_POST['FConfig']))
           $this->updateINI($_POST['FConfig'], $fconfig);

        $this->render('configs', array('fconfig'=>$fconfig));
    }

    public function actionThemes()
    {
        $fconfig = new FConfig();

        $this->performAjaxValidation($fconfig);

        if(isset($_POST['FConfig']))
            $this->updateINI($_POST['FConfig'], $fconfig);

        $this->render('configs', array('fconfig'=>$fconfig));
    }

    public function actionSeo()
    {
        $fconfig = new FConfig();

        $this->performAjaxValidation($fconfig);

        if(isset($_POST['FConfig']))
            $this->updateINI($_POST['FConfig'], $fconfig);

        $this->render('configs', array('fconfig'=>$fconfig));
    }

    public function actionFiles()
    {
        $fconfig = new FConfig();

        $this->performAjaxValidation($fconfig);

        if(isset($_POST['FConfig']))
            $this->updateINI($_POST['FConfig'], $fconfig);

        $this->render('configs', array('fconfig'=>$fconfig));
    }

    public function actionMmotop()
    {
        $fconfig = new FConfig();

        $this->performAjaxValidation($fconfig);

        if(isset($_POST['FConfig']))
            $this->updateINI($_POST['FConfig'], $fconfig);

        $this->render('configs', array('fconfig'=>$fconfig));
    }

    public function actionPrices()
    {
        $fconfig = new FConfig();

        $this->performAjaxValidation($fconfig);

        if(isset($_POST['FConfig']))
            $this->updateINI($_POST['FConfig'], $fconfig);

        $this->render('configs', array('fconfig'=>$fconfig));
    }

    public function actionReset()
    {
        $fconfig = new FConfig();

        $this->performAjaxValidation($fconfig);

        if(isset($_POST['FConfig']))
            $this->updateINI($_POST['FConfig'], $fconfig);

        $this->render('configs', array('fconfig'=>$fconfig));
    }

    public function actionIpb()
    {
        $fconfig = new FConfig();

        $this->performAjaxValidation($fconfig);

        if(isset($_POST['FConfig']))
            $this->updateINI($_POST['FConfig'], $fconfig);

        $this->render('configs', array('fconfig'=>$fconfig));
    }

    public function actionCaching()
    {
        $fconfig = new FConfig();

        $this->performAjaxValidation($fconfig);

        if(isset($_POST['FConfig']))
            $this->updateINI($_POST['FConfig'], $fconfig);

        $this->render('configs', array('fconfig'=>$fconfig));
    }

	public function actionEntrance()
	{
        $model = new Entrance;
		
        $this->performAjaxValidation($model);

        if(isset($_POST['Entrance']))
        {
            if($_POST['Entrance']['usr'] == '' || $_POST['Entrance']['pwd'] == '')
            {
                Yii::app()->user->setFlash('warn', Yii::t(''.Yii::app()->request->cookies['language']->value, 'Need to fill in login and password'));
                $this->refresh();
            }

            $this->_identity = new UserIdentity($_POST['Entrance']['usr'],$_POST['Entrance']['pwd']);
            if($this->_identity->authenticate())
            {
                Yii::app()->user->login($this->_identity);
                $model = $this->loadAdminModel($_POST['Entrance']['usr']);
                switch($model->status)
                {
                    case "super-administrator"  :         $page = 'main';    break;
                    case "administrator"        :         $page = 'main';    break;
                    case "moderator"            :         $page = 'main';    break;
                    case "journalist"           :         $page = 'news';    break;
                }

                $this->redirect($page);
            }
            else
            {
                Yii::app()->user->setFlash('delete', Yii::t(''.Yii::app()->request->cookies['language']->value, 'Login or password is not correct'));
                $this->refresh();
            }
        }

        $this->layout = 'login_page';
        $this->render('login',array('model'=>$model));
	}

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect($this->createUrl('main/login'));
    }

    public function loadModel($id)
    {
        $model = Home::model()->findByAttributes(array('id'=>$id));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function loadAdminModel($login)
    {
        $model = AdminGroup::model()->findByAttributes(array('name'=>$login));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='config-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function getUserWrapper($usr,$row)
    {
        $userColors = array(
            'super-administrator'   => array("<span class='super-admin'>".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Super administrator')."</span>"),
            'administrator'         => array("<span class='admin'>".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Administrator')."</span>"),
            'moderator'             => array("<span class='moder'>".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Moderator')."</span>"),
            'journalist'            => array("<span class='journalist'>".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Journalist')."</span>"),
            'user'                  => array("<span class='user'>".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'User')."</span>"),
        );

        return $userColors[$usr][$row];
    }

    public function getRoles()
    {
        $roles = array(
            'journalist'            =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Journalist'),
            'moderator'             =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Moderator'),
            'administrator'         =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Administrator'),
            'super-administrator'   =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Super administrator'),
        );

        return $roles;
    }
}