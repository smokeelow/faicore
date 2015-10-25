<?php
class FrontEndController extends BaseController
{
    public $menu = array();

    public $breadcrumbs = array();


    public function __construct($id,$module=null){
        parent::__construct($id,$module);

        if(isset($_POST['language'])) {
            $lang = $_POST['language'];
            $MultilangReturnUrl = $_POST[$lang];
            $this->redirect($MultilangReturnUrl);
        }
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
            $url = str_ireplace(Yii::app()->request->cookies['server']->value,$_POST['server'],Yii::app()->request->requestUri);
            Yii::app()->request->cookies['server'] = new CHttpCookie('server', strtolower($_POST['server']));
            $this->redirect($url);
        }

        if(isset($_GET['server']) && Yii::app()->user->isGuest)
        {
            Yii::app()->user->setState('server', $_GET['server']);
            $cookie = new CHttpCookie('server', strtolower($_GET['server']));
            $cookie->expire = time() + (60*60*24*365); // (1 year)
            Yii::app()->request->cookies['server'] = $cookie;
            $_COOKIE['server'] = Yii::app()->request->cookies['server']->value;
        }
        else if (Yii::app()->user->hasState('server'))
            $_COOKIE['server'] = Yii::app()->user->getState('server');
        else if(isset(Yii::app()->request->cookies['server']))
            $_COOKIE['server'] = Yii::app()->request->cookies['server']->value;
    }
    public function createMultilanguageReturnUrl($lang='ru'){
        if (count($_GET)>0){
            $arr = $_GET;
            $arr['language']= $lang;
        }
        else
            $arr = array('language'=>$lang);
        return $this->createUrl('', $arr);
    }

}
