<?php

class RegistrationController extends FrontEndController
{
    public $layout ='//layouts/mainPage';

	public function actionIndex()
	{
        if(!Yii::app()->user->isGuest)
        {
            $this->redirect(array('cp/index'));
        }

        $model = new Account;

        $this->performAjaxValidation($model);
        if(isset($_POST['Account']))
        {
            $model->attributes = $_POST['Account'];

            if($this->getFConfig('md5') == 1)
            {
                $password = '[dbo].[fn_md5]('.$_POST['Account']['memb__pwd'].','.$_POST['Account']['memb___id'].')';
            }
            else
            {
                $password = $_POST['Account']['memb__pwd'];
            }

            $model->memb__pwd   = $password;
            $model->sno__numb   = 1;
            $model->bloc_code   = 0;
            $model->ctl1_code   = 1;
            $model->reg_date    = time();
            $model->user_ip     = Yii::app()->request->userHostAddress;
            $model->status      = 'user';

            if($model->save())
            {
                if(!is_dir('protected/log')) {mkdir('protected/log');chmod("log", 0755);}
                file_put_contents(
                    'protected/log/'.Yii::app()->request->cookies['language']->value.'_FRONT_'.date('d_m_Y').'_REG_USERS.txt',
                        $_POST['Account']['memb___id']."\t".
                        $_POST['Account']['memb__pwd']."\t".
                        $_POST['Account']['memb_name']."\t".
                        $_POST['Account']['mail_addr']."\t".
                        Yii::app()->request->userHostAddress."\t".
                        date('d.m.Y H:i:s')."\t".
                        Yii::app()->browser->getBrowser()."\t".
                        Yii::app()->browser->getVersion()."\t".
                        Yii::app()->browser->getPlatform()."\t".
                        $_SERVER['HTTP_USER_AGENT']."\n",
                    FILE_APPEND
                );

                Yii::app()->session->add('registered',1);
                Yii::app()->session->add('userAccount',$_POST['Account']['memb___id']);
                Yii::app()->session->add('userPassword',$_POST['Account']['memb__pwd']);
                Yii::app()->session->add('userName',$_POST['Account']['memb_name']);
                Yii::app()->session->add('userEmail',$_POST['Account']['mail_addr']);

                $this->redirect($this->createUrl('cp/login'));
            }
        }

        $this->pageTitle = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Registration').' / '
            .$this->getFConfig('regTitle').' / '.
            $this->getFConfig('serverName');

        $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Registration');

        $this->breadcrumbs=array(
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Registration'),
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'New user')
        );

        Yii::app()->clientScript->registerMetaTag($this->getFConfig('metaDescReg'), 'description');
        Yii::app()->clientScript->registerMetaTag($this->getFConfig('metaKeyReg'), 'keywords');

        $this->render('index',array(
            'model'=>$model
        ));
	}

    public function actionSendmail()
    {
        if(isset($_POST['send']))
        {
            $to      = Yii::app()->session->get('userEmail');
            $subject = $this->getFConfig('serverName').': '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Registration information').' '.Yii::app()->session->get('userAccount');
            $message = FAI_MAIL::getRegTemplate(Yii::app()->session->get('userAccount'),Yii::app()->session->get('userPassword'),Yii::app()->session->get('userName'),Yii::app()->session->get('userEmail'));
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
            $headers .= 'To: '.Yii::app()->session->get('userEmail').'' . "\r\n";
            $headers .= 'From: '.$this->getFConfig('email').'' . "\r\n";

            mail($to, $subject, $message, $headers);

            unset(Yii::app()->session['registered']);
            unset(Yii::app()->session['userAccount']);
            unset(Yii::app()->session['userPassword']);
            unset(Yii::app()->session['userName']);
            unset(Yii::app()->session['userEmail']);
        }
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}