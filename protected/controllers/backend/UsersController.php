<?php
class UsersController extends BackEndController
{
    public function filters()
    {
        return array(
            'ajaxOnly + ajax',
        );
    }

    public function actionIndex()
    {
        $this->pageTitle= Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Users ').'/ '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'User list').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel').' / '.
            Yii::app()->getFConfig('serverName');

        $this->pageH1 =  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Users ');

        $this->render('index');
    }

    public function actionAjax($string,$params='')
    {
        switch($string)
        {
            case md5('getAll'.$this->salt)          : $return = $this->getResults();                break;
            case md5('getCharDetail'.$this->salt)   : $return = $this->getCharDetails();            break;
            case md5('getAccBan'.$this->salt)       : $return = $this->getFinderAccBan($params);    break;
        }

        return $return;
    }

    private function getFinderAccBan($acc)
    {
        $model = Account::model()->find(array(
            'select'=>'memb___id,usr_avatar',
            'condition'=>'memb___id=:memb___id',
            'params'=>array(':memb___id'=>$acc)
        ));

        $this->renderPartial('block/finder/actions/ban',array('model'=>$model));
    }


    private function getResults()
    {
        $model = Character::model()->findAll(array(
            'select'=>'AccountID,Name',
            'condition'=>'Name LIKE :search',
            'limit'=>100,
            'params'=>array(':search'=>'%'.$_POST['char'].'%')));

        if(!empty($model))
        {
            $i = 0;
            foreach($model as $item)
            {
                ++$i;
                $this->renderPartial('block/finder/row',array('model'=>$item,'i'=>$i));
            }
        }
        else
        {
            echo '<div id="acc-notf">'.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Account not found').'</div>';
        }
    }

    public function actionBan()
    {
        $this->render('ban');
    }

    public function actionFindacc()
    {
        $this->pageH1 =  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Search account');

        $this->renderPartial('block/findacc');
    }

    public function actionProfile($id)
    {
        $model = $this->loadAccModel($id);

        $this->pageH1 =  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Profile').' / '.
            $model->memb___id;

        $chars = Character::model()->findAll(array(
            'select'=>'Name,cLevel,'.$this->getFConfig('reset_col').','.$this->getFConfig('greset_col').', Class, Strength, Dexterity, Vitality, Energy, Money, MapNumber, MapPosY, MapPosX, PkCount, PkLevel, CtlCode',
            'condition'=>'AccountID=:AccountID',
            'params'=>array(':AccountID'=>$model->memb___id)
        ));

        $this->renderPartial('block/profile',array(
            'model'=>$model,
            'chars'=>$chars
        ));
    }

    public function actionLockchar($alias)
    {
        if(isset($_POST['lock']))
        {
            $model = $this->loadCharModel($alias);

            if($model->updateAll(array('CtlCode'=>'1'),'Name=:Name',array(':Name'=>$alias)))
            {
                echo $this->createUrl('unlockchar', array('alias'=>$model->Name));
            }
        }
    }

    public function actionUnlockchar($alias)
    {
        if(isset($_POST['lock']))
        {
            $model = $this->loadCharModel($alias);

            if($model->updateAll(array('CtlCode'=>'0'),'Name=:Name',array(':Name'=>$alias)))
            {
                echo $this->createUrl('lockchar', array('alias'=>$model->Name));
            }
        }
    }

    public function actionCompose($id,$action)
    {
        $model=$this->loadAccModel($id);

        $this->pageH1 =  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Write a letter').' / '.
            $model->memb___id;

        $form = new MailForm;

        $this->performAjaxValidation($form);

        $this->renderPartial('block/email/compose',array(
            'model'=>$model,
            'mail'=>$form,
            'action'=>$action
        ));
    }

    public function  actionSendcompose($id)
    {
        $model = $this->loadAccModel($id);

        if(isset($_POST['compose']) && $_POST['compose'] != '')
        {
            $to       = $model->mail_addr;
            $subject  = $this->getFConfig('serverName').': '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Message from administrator').' - "'.$_POST['topic'].'"';
            $message  = $_POST['message'];
            $headers  = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
            $headers .= 'To: '.$model->mail_addr.'' . "\r\n";
            $headers .= 'From: '.$this->getFConfig('email').'' . "\r\n";

            if(mail($to, $subject, $message, $headers))
            {
                echo '<div class="success-msg">'.Yii::t(Yii::app()->request->cookies['language']->value, 'The message has been successfully sent').'</div>';
            }
            else
            {
                echo '<div class="error-msg">'.Yii::t(Yii::app()->request->cookies['language']->value, 'An error has occurred').'</div>';
            }
        }
    }

    public function actionReginfo($id,$action)
    {
        $model = $this->loadAccModel($id);

        $this->pageH1 =  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Send registration data').' / '.
            $model->memb___id;

        $this->renderPartial('block/reginfo',array(
            'model'=>$model,
            'action'=>$action
        ));
    }

    public function actionSendreginfo($id)
    {
        $model = $this->loadAccModel($id);

        if(isset($_POST['send']) && $_POST['send'] !='')
        {
            $to      = $model->mail_addr;
            $subject = $this->getFConfig('serverName').': '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Registration information').' '.Yii::app()->session->get('userAccount');
            $message = FAI_MAIL::getRegTemplate($model->memb___id,$model->memb__pwd,$model->memb_name,$model->mail_addr);
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
            $headers .= 'To: '.$model->mail_addr.'' . "\r\n";
            $headers .= 'From: '.$this->getFConfig('email').'' . "\r\n";

            if(mail($to, $subject, $message, $headers))
            {
                echo '<div class="success-msg">'.Yii::t(Yii::app()->request->cookies['language']->value, 'The message has been successfully sent').'</div>';
            }
            else
            {
                echo '<div class="error-msg">'.Yii::t(Yii::app()->request->cookies['language']->value, 'An error has occurred').'</div>';
            }
        }
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='mail-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function loadAccModel($id)
    {
        $model=Account::model()->find(array(
            'select'=>'memb_guid,memb___id, memb__pwd,memb_name,mail_addr',
            'condition'=>'memb_guid=:memb_guid',
            'params'=>array(':memb_guid'=>$id)
        ));

        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function loadCharModel($alias)
    {
        $model=Character::model()->find(array(
            'select'=>'Name,cLevel,'.$this->getFConfig('reset_col').','.$this->getFConfig('greset_col').', Class, Strength, Dexterity, Vitality, Energy, Money, MapNumber, MapPosY, MapPosX, PkCount, PkLevel, CtlCode',
            'condition'=>'Name=:Name',
            'params'=>array(':Name'=>$alias)
        ));

        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function getFinderHtml()
    {
        echo $this->renderPartial('block/finder/form');
    }

    public function getFinderContent()
    {
        echo $this->renderPartial('block/finder/content');
    }

    public function getFinderAccImage($image)
    {
        if($image == '')
            return $this->getTemplate('core').'images/no-avatar.png';
        else
            return $image;
    }

    public function getFinderAccBanStatus($acc)
    {
        if($acc == '0')
            echo  Yii::t(Yii::app()->request->cookies['language']->value, 'Not blocked');
        else
            echo  Yii::t(Yii::app()->request->cookies['language']->value, 'Block');
    }

    public function getFinderCharacters($acc)
    {
        $characters = Character::model()->getFinderAccCharacters($acc);
        $this->renderPartial('block/finder/characters',array('model'=>$characters));
    }
}