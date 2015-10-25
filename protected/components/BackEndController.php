<?php

class BackEndController extends BaseController
{
    public $menu = array();

    public $breadcrumbs = array();

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            // даем доступ только админам
            array(
                'allow',
                'roles'=>array('super-administrator','administrator','moderator'),
            ),
            array(
                'allow',
                'controllers'=>array('news'),
                'roles'=>array('journalist')
            ),
            // всем остальным разрешаем посмотреть только на страницу авторизации
            array(
                'allow',
                'actions'=>array('entrance','logout','captcha'),
                'users'=>array('*'),
            ),
            array(
                'deny',
                'actions'=>array('createuser'),
                'roles'=>array('moderator'),
            ),
            // запрещаем все остальное
            array(
                'deny',
                'users'=>array('*'),
            ),
        );
    }

    public function __construct($id,$module=null)
    {
        parent::__construct($id,$module);
        // If there is a post-request, redirect the application to the provided url of the selected language
        if(isset($_POST['language'])){
            $lang = $_POST['language'];
            $MultilangReturnUrl = $_POST[$lang];

            $this->redirect($MultilangReturnUrl);
        }
        // Set the application language if provided by GET, session or cookie
        if(isset($_GET['language'])) {
            Yii::app()->language = $_GET['language'];
            Yii::app()->user->setState('language', $_GET['language']);
            $cookie = new CHttpCookie('language', $_GET['language']);
            $cookie->expire = time() + (60*60*24*365); // (1 year)
            Yii::app()->request->cookies['language'] = $cookie;
            $_COOKIE['language'] = Yii::app()->request->cookies['language']->value;
        }
        else if (Yii::app()->user->hasState('language'))
            Yii::app()->language = Yii::app()->user->getState('language');
        else if(isset(Yii::app()->request->cookies['language']))
            Yii::app()->language = Yii::app()->request->cookies['language']->value;

        if($_POST['server'])
        {
            $url = str_ireplace($_COOKIE['server'],$_POST['server'],Yii::app()->request->requestUri);
            Yii::app()->request->cookies['server'] = new CHttpCookie('server', strtolower($_POST['server']));
            $this->redirect($url);
        }
    }
    public function createMultilanguageReturnUrl($lang='en')
    {
        if (count($_GET)>0){
            $arr = $_GET;
            $arr['language']= $lang;
        }
        else
            $arr = array('language'=>$lang);

        return $this->createUrl('', $arr);
    }
}
