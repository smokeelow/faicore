<?php
class CpController extends FrontEndController
{
    private     $_identity;
    public      $layout ='//layouts/cpPage';


    public function filters()
    {
        return array(
            'accessControl',
            'ajaxOnly + ajax',
        );
    }

    public function accessRules()
    {
        return array(
            array(
                'allow',
                'users'=>array('@'),
            ),
            array(
                'allow',
                'actions'=>array('login','recovery'),
                'users'=>array('*'),
            ),
            array(
                'deny',
                'users'=>array('*'),
            ),
        );
    }

	public function actionIndex()
	{
        $criteria = new CDbCriteria();

        $criteria->condition = 'status=:status';
        $criteria->params = array(':status'=>'1');
        $criteria->order  = 'date DESC';
        $dataProvider=new CActiveDataProvider('FAI_CPHOME', array('criteria'=>$criteria));

        $this->pageTitle = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Home');

        $this->breadcrumbs=array(
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Control panel'),
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Home')
        );

        Yii::app()->clientScript->registerMetaTag($this->getFConfig('metaDesc'), 'description');
        Yii::app()->clientScript->registerMetaTag($this->getFConfig('metaKey'), 'keywords');

        $this->render('index',array(
            'dataProvider'=>$dataProvider
        ));
	}

    public function actionAjax($id,$params='')
    {
        switch($id)
        {
            case md5('characters'.$this->salt)      : $return = $this->getCharacters();     break;
            case md5('userpanel'.$this->salt)       : $return = $this->getUserPanel();      break;
            case md5('mcharicon'.$this->salt)       : $return = $this->getCCharIcon();      break;
            case md5('charinfo'.$this->salt)        : $return = $this->getCharInfo();       break;
            case md5('teleportation'.$this->salt)   : $return = $this->getTeleportation();  break;
            case md5('pkclear'.$this->salt)         : $return = $this->getPkclear();        break;
            case md5('points'.$this->salt)          : $return = $this->getPoints();         break;
            case md5('reset'.$this->salt)           : $return = $this->getReset();          break;
            case md5('resetpoints'.$this->salt)     : $return = $this->getResetPoints();    break;
            case md5('opentickets'.$this->salt)     : $return = $this->getOpenTickets();    break;
            case md5('closedtickets'.$this->salt)   : $return = $this->getClosedTickets();  break;
            case md5('ticket'.$this->salt)          : $return = $this->getTicket($params);  break;
            case md5('createticket'.$this->salt)    : $return = $this->getCreateTicket();   break;
            case md5('voting'.$this->salt)          : $return = $this->getVoting();         break;
            case md5('votecheck'.$this->salt)       : $return = $this->getVoteCheck();      break;
            case md5('rctransfer'.$this->salt)      : $return = $this->getRCTransfer();     break;
            case md5('payment'.$this->salt)         : $return = $this->getPayment();        break;
        }

        return $return;
    }

    public function actionArticle($id)
    {
        $model = $this->loadAModel($id);

        $this->pageTitle = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Home').' / '.
            $model->title;

        $this->pageH1 = $model->title;

        $this->breadcrumbs=array(
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Control panel'),
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Home'),
            $model->title
        );

        $this->render('article',array(
            'model'=>$model
        ));
    }

    public function actionPayment()
    {
        $this->render('payment');
    }

    private function getInterkassa()
    {
        echo 'hello лалка, мамку ипал';
    }

    protected function getUserPanel()
    {
        $this->renderPartial('html/userPanel');
    }

    protected function getCharacters()
    {
        $this->renderPartial('block/selectChar');
    }

    protected function getCCharIcon()
    {
        echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', Yii::app()->user->username).' '.
        CHtml::image(Character::getCImage(Yii::app()->user->char),Yii::app()->user->username,array('width'=>'20','height'=>'20'));
    }

    protected function getCharInfo()
    {
        $model = Character::model()->find(array(
            'select'=>'Money,cLevel,Class,'.$this->getFConfig('reset_col').','.$this->getFConfig('greset_col').'',
            'condition'=>'AccountID=:AccountID AND Name=:Name',
            'params'=>array(':AccountID'=>Yii::app()->user->username, ':Name'=>Yii::app()->user->char)
        ));

        $this->renderPartial('html/charInfo',array('model'=>$model));
    }

    public function actionSettings()
    {
        $model = Account::model()->find(array(
            'select'=>'memb_guid,memb__pwd,mail_addr,memb_name,usr_avatar,usr_country,usr_city,usr_gender,usr_signature',
            'condition'=>'memb___id=:memb___id',
            'params'=>array(':memb___id'=>Yii::app()->user->username)
        ));

        $this->performAjaxValidation($model);
        if(isset($_POST['Account']))
        {
            $model->attributes = $_POST['Account'];

            if($_POST['Account']['new_name'] != '')
                $model->memb_name = $_POST['Account']['new_name'];
            else
                $model->memb_name = $model->memb_name;

            if($_POST['Account']['new_email'] != '')
                $model->mail_addr = $_POST['Account']['new_email'];
            else
                $model->mail_addr = $model->mail_addr;

            if($_POST['Account']['new_password'] !='')
                $model->memb__pwd = $_POST['Account']['new_password'];
            else
                $model->memb__pwd = $model->memb__pwd;

            if($model->save())
            {
                Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Setting has been successfully saved'));
                $this->refresh();
            }
        }

        $this->pageTitle = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'My settings');

        $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'My settings');

        $this->breadcrumbs=array(
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'My settings'),
        );

        $this->render('settings',array('model'=>$model));
    }

    public function actionRecovery()
    {
        if(isset($_POST['recovery']))
        {
             if($_POST['recovery'] == '')
             {
                 Yii::app()->user->setFlash('warn', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Please enter the email you used to sign up'));
                 $this->refresh();
             }

            $model = Account::model()->find(array(
                'select'=>'memb___id,memb_name,mail_addr, memb__pwd',
                'condition'=>'mail_addr=:mail_addr',
                'params'=>array(':mail_addr'=>$_POST['recovery'])
            ));

            if(empty($model) || $model == '')
            {
                Yii::app()->user->setFlash('delete', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'This E-Mail is not registered'));
                $this->refresh();
            }
            else
            {
                $to      = $model->mail_addr;
                $subject = $this->getFConfig('serverName').': '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Registration information').' '.$model->memb___id;
                $message = FAI_MAIL::getRegTemplate($model->memb___id,$model->memb__pwd,$model->memb_name,$model->mail_addr);
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                $headers .= 'To: '.$model->mail_addr.'' . "\r\n";
                $headers .= 'From: '.$this->getFConfig('email').'' . "\r\n";

                if(mail($to, $subject, $message, $headers))
                {
                    Yii::app()->user->setFlash('success',Yii::t(Yii::app()->request->cookies['language']->value, 'The message with registration data has been send successfully'));
                    $this->refresh();
                }
                else
                {
                    Yii::app()->user->setFlash('success',Yii::t(Yii::app()->request->cookies['language']->value, 'An error has occurred'));
                    $this->refresh();
                }
            }
        }


        $this->pageTitle = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Recover password').' / '.
            $this->getFConfig('serverName');

        $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Recover password');

        $this->breadcrumbs=array(
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Recover password'),
        );

        $this->layout = '//layouts/mainPage';
        $this->render('recovery');
    }

    public function actionLogin()
    {
        if(!Yii::app()->user->isGuest)
            $this->redirect('index');

        $model = new Account;

        $this->performAjaxValidation($model);

        if(isset($_POST['Account']))
        {
            if($_POST['Account']['memb___id'] == "" || $_POST['Account']['memb__pwd'] == "")
            {
                Yii::app()->user->setFlash('warn', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Need to fill in login and password'));
                $this->refresh();
            }

            $this->_identity = new UserIdentity($_POST['Account']['memb___id'],$_POST['Account']['memb__pwd']);
            if($this->_identity->authenticate())
            {
                $model = Account::model()->findByAttributes(array('memb___id'=>$_POST['Account']['memb___id']));
                $getChars = AccountCharacter::model()->findByAttributes(array('Id'=>$_POST['Account']['memb___id']));
                if($getChars->GameID1 == "" && $getChars->GameID2 == "" && $getChars->GameID3 == "" && $getChars->GameID4 == "" && $getChars->GameID5 == "")
                {
                    Yii::app()->user->setFlash('delete', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'You must create character in the game before login on the site'));
                    $this->refresh();
                }
                elseif($model->bloc_code == '1')
                {
                    Yii::app()->user->setFlash('delete', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Your account has been banned'));
                    $this->refresh();
                }
                else
                {
                    Yii::app()->user->login($this->_identity);
                    $this->redirect('index');
                }
            }
            else
            {
                Yii::app()->user->setFlash('delete', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Login or password is not correct'));
                $this->refresh();
            }
        }

        if(Yii::app()->session->get('registered') == 1)
        {
            Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Congratulations! Your account has been successfully registered. Login to your account using your username and password.'));
        }

        $this->pageTitle = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Sign in').' / '
            .$this->getFConfig('logTitle').' / '.
            $this->getFConfig('serverName');

        $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Sign in');

        $this->breadcrumbs=array(
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Sign in'),
        );

        Yii::app()->clientScript->registerMetaTag($this->getFConfig('metaDescLog'), 'description');
        Yii::app()->clientScript->registerMetaTag($this->getFConfig('metaKeyLog'), 'keywords');

        $this->layout = 'loginPage';
        $this->render('auth', array(
            'model'=>$model
        ));
    }

    public function actionCharacters()
    {
        $this->pageTitle = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'My characters');

        $this->breadcrumbs=array(
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Control panel'),
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Characters')
        );

        $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Characters');

        $this->render('characters');
    }

    public function actionSecurity()
    {
        $model = $this->loadSModel(Yii::app()->user->guid);

        $this->performAjaxValidation($model);

        if(isset($_POST['Security']))
        {
            $model->attributes = $_POST['Security'];
            $model->memb__pwd  = $_POST['Security']['new_pwd'];

            if (!preg_match ('/^[a-z0-9]+$/is', $_POST['Security']['new_pwd']))
                $model->addError($_POST['Security']['new_pwd'], Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Allowed only latin characters and numbers'));

            if($model->save())
            {
                Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Password')." "
                    .Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been')." "
                    .Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'successfully updated') );
                $this->refresh();
            }
        }

        $this->pageTitle = Yii::app()->user->username.' / '
            .Yii::app()->user->char.' / '
            .Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Control panel').' / '
            .Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Security').' / '.
            $this->getFConfig('serverName'). ' / ';

        $this->breadcrumbs=array(
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Control panel'),
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Security')
        );

        $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Security');

        $this->render('security',array(
            'model'=>$model
        ));
    }

    private function getTeleportation()
    {
        if($this->getFConfig('teleportationMItem'))
        {
            $model = new Character;
            $char  = $this->loadCModel();

            if(isset($_POST['map']))
            {
                if($_POST['map'] != "")
                {
                    $money = $char->Money;
                    $reset = $this->getFConfig('reset_col');

                    if($this->getFConfig('tp_status') != 0)
                    {
                        if($char->$reset == 0)
                            $charReset = 1;
                        else
                            $charReset = $char->$reset;

                        $tpPrice  = intval($this->getFConfig('tp_price') * $charReset * $char->cLevel);
                        $totalPrice = $money - $tpPrice;
                    }
                    else
                    {
                        $totalPrice = $this->getFConfig('tp_priceFix');
                    }

                    if($model->getOInfo(Yii::app()->user->username,Yii::app()->user->char) == 1)
                    {
                        Yii::app()->user->setFlash('delete', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'For teleportation character must be offline'));
                        $this->refresh();
                    }
                    elseif($char->cLevel < 10)
                    {
                        Yii::app()->user->setFlash('warn', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Teleportation is only available from level 10'));
                        $this->refresh();
                    }
                    elseif($totalPrice < 0)
                    {
                        Yii::app()->user->setFlash('delete', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'The character is not enough money'));
                        $this->refresh();
                    }
                    else
                    {
                        Character::model()->updateAll(array(
                                'Money'=>$totalPrice,
                                'MapNumber'=>$model->getTMap($_POST['map'],0),
                                'MapPosX'=>$model->getTMap($_POST['map'],1),
                                'MapPosY'=>$model->getTMap($_POST['map'],2),
                            ),
                            'AccountID=:AccountID AND Name=:Name',
                            array(
                                ':AccountID'=>Yii::app()->user->username,
                                ':Name'=>Yii::app()->user->char
                            )
                        );

                        Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Character has been successfully teleported'));
                        $this->refresh();
                    }
                }
                else
                {
                    Yii::app()->user->setFlash('warn', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Need to select a map for teleportation'));
                    $this->refresh();
                }
            }

            $this->pageTitle = Yii::app()->user->username.' / '
                .Yii::app()->user->char.' / '
                .Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Control panel').' / '
                .Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Teleportation').' / '.
                $this->getFConfig('serverName');

            $this->breadcrumbs=array(
                Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Control panel'),
                Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Teleportation')
            );

            $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Teleportation');

            $this->renderPartial('block/teleportation',array('char'=>$char,'model'=>$model),false,true);
        }
    }

    private function getPoints()
    {
        if($this->getFConfig('pointsMItem'))
        {
            $model = $this->loadCModel();
            $this->performAjaxValidation($model);

            if(isset($_POST['Character']))
            {
                if($_POST['Character']['Str'] != "" || $_POST['Character']['Dex'] != "" || $_POST['Character']['Vit'] != "" || $_POST['Character']['Ene'] != "" || $_POST['Character']['Com'] != "")
                {
                    $model->attributes=$_POST['Character'];

                    if($model->Class != 64 && $model->Class != 65 && $model->Class != 66)
                        $_POST['Character']['Com'] = 0;

                    $addPoints = $_POST['Character']['Str']+$_POST['Character']['Dex']+$_POST['Character']['Vit']+$_POST['Character']['Ene']+$_POST['Character']['Com'];

                    $str = Character::getCPoints($model->Strength)   + $_POST['Character']['Str'];
                    $dex = Character::getCPoints($model->Dexterity)  + $_POST['Character']['Dex'];
                    $vit = Character::getCPoints($model->Vitality)   + $_POST['Character']['Vit'];
                    $ene = Character::getCPoints($model->Energy)     + $_POST['Character']['Ene'];
                    $com = Character::getCPoints($model->Leadership) + $_POST['Character']['Com'];

                    if($str > $this->getFConfig('maxPoints')) $str = $model->Strength;
                    if($dex > $this->getFConfig('maxPoints')) $dex = $model->Dexterity;
                    if($vit > $this->getFConfig('maxPoints')) $vit = $model->Vitality;
                    if($ene > $this->getFConfig('maxPoints')) $ene = $model->Energy;
                    if($com > $this->getFConfig('maxPoints')) $com = $model->Leadership;

                    if(self::getNumber($_POST['Character']['Str']) > $this->getFConfig('maxPoints')
                        || self::getNumber($_POST['Character']['Dex']) > $this->getFConfig('maxPoints')
                        || self::getNumber($_POST['Character']['Vit']) > $this->getFConfig('maxPoints')
                        || self::getNumber($_POST['Character']['Ene']) > $this->getFConfig('maxPoints')
                        || self::getNumber($_POST['Character']['Com']) > $this->getFConfig('maxPoints'))
                    {
                        $exceeded = true;
                    }
                    else
                    {
                        $totalPoints = $model->LevelUpPoint - $addPoints;
                    }

                    if($exceeded)
                    {
                        Yii::app()->user->setFlash('delete',
                            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'You can add up to').' '.
                                Character::getRCount($this->getFConfig('maxPoints'),array(
                                    Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'point'),
                                    Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'points '),
                                    Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'points')
                                )).' '.
                                Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'per attribute')
                        );

                        $this->refresh();
                    }
                    elseif($model->getOInfo(Yii::app()->user->username,Yii::app()->user->char) == 1)
                    {
                        Yii::app()->user->setFlash('delete', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'For add points, character must be offline'));
                        $this->refresh();
                    }
                    elseif($totalPoints < 0)
                    {
                        Yii::app()->user->setFlash('delete', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'You do not have enough points'));
                        $this->refresh();
                    }
                    else
                    {
                        if($model->validate())
                        {
                            Character::model()->updateAll(array('Strength'=>$str,'Dexterity'=>$dex, 'Vitality'=>$vit, 'Energy'=>$ene, 'Leadership'=>$com, 'LevelUpPoint'=>$totalPoints), 'Name=:Name', array(':Name'=>Yii::app()->user->char));
                            Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Points has been successfully added'));
                            $this->refresh();
                        }
                    }
                }
                else
                {
                    Yii::app()->user->setFlash('warn', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Need to fill one of input fields'));
                    $this->refresh();
                }
            }

            $this->pageTitle = Yii::app()->user->username.' / '
                .Yii::app()->user->char.' / '
                .Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Control panel').' / '
                .Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Points').' / '.
                $this->getFConfig('serverName');

            $this->breadcrumbs=array(
                Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Control panel'),
                Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Points')
            );

            $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Points');

            Yii::app()->clientScript->scriptMap['jquery.js'] = false;

            $this->renderPartial('block/points',array('model'=>$model),false,true);
        }
    }

    private function getResetPoints()
    {
        $model = $this->loadCModel();

        if ($model->Class == 64 || $model->Class == 65 || $model->Class == 66)
            $totalCPoints = Character::getCPoints($model->Strength)+Character::getCPoints($model->Dexterity)+Character::getCPoints($model->Vitality)+Character::getCPoints($model->Energy)+Character::getCPoints($model->Leadership);
        else
            $totalCPoints = Character::getCPoints($model->Strength)+Character::getCPoints($model->Dexterity)+Character::getCPoints($model->Vitality)+Character::getCPoints($model->Energy);
        $getClass = new Character;

        $default	    = $getClass->getCClass($model->Class,6)+$getClass->getCClass($model->Class,7)+$getClass->getCClass($model->Class,8)+$getClass->getCClass($model->Class,9)+$getClass->getCClass($model->Class,10);
        $resetPoints    = $totalCPoints - $default;

        if($model->getOInfo(Yii::app()->user->username,Yii::app()->user->char) == 1)
        {
            Yii::app()->user->setFlash('delete', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'For reset points, character must be offline'));
        }
        else
        {
            Character::model()->updateAll(array(
                'Strength'      =>$getClass->getCClass($model->Class,6),
                'Dexterity'     =>$getClass->getCClass($model->Class,7),
                'Vitality'      =>$getClass->getCClass($model->Class,8),
                'Energy'        =>$getClass->getCClass($model->Class,9),
                'Leadership'    =>$getClass->getCClass($model->Class,10),
                'LevelUpPoint'  =>$model->LevelUpPoint+$resetPoints,
            ), 'AccountID=:AccountID AND Name=:Name', array(':AccountID'=>Yii::app()->user->username,':Name'=>Yii::app()->user->char));

            Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Points has been successfully nulled'));
        }

        $this->redirect(array('ajax','id'=>md5('points'.$this->salt)));
    }

    private function getReset()
    {
        if($this->getFConfig('resetMItem'))
        {
            $model = $this->loadCModel();

            if(isset($_POST['reset']))
            {
                $resColumn = $this->getFConfig('reset_col');
                $resNumber = $model->$resColumn + 1;
                $getClass  = new Character;

                switch($model->Class)
                {
                    case 0   : $newPoints = $this->getFConfig('resetDwPoints')  * $resNumber; break;
                    case 1   : $newPoints = $this->getFConfig('resetDwPoints')  * $resNumber; break;
                    case 2   : $newPoints = $this->getFConfig('resetDwPoints')  * $resNumber; break;
                    case 3   : $newPoints = $this->getFConfig('resetDwPoints')  * $resNumber; break;
                    case 16  : $newPoints = $this->getFConfig('resetDkPoints')  * $resNumber; break;
                    case 17  : $newPoints = $this->getFConfig('resetDkPoints')  * $resNumber; break;
                    case 18  : $newPoints = $this->getFConfig('resetDkPoints')  * $resNumber; break;
                    case 19  : $newPoints = $this->getFConfig('resetDkPoints')  * $resNumber; break;
                    case 32  : $newPoints = $this->getFConfig('resetElfPoints') * $resNumber; break;
                    case 33  : $newPoints = $this->getFConfig('resetElfPoints') * $resNumber; break;
                    case 34  : $newPoints = $this->getFConfig('resetElfPoints') * $resNumber; break;
                    case 35  : $newPoints = $this->getFConfig('resetElfPoints') * $resNumber; break;
                    case 48  : $newPoints = $this->getFConfig('resetMgPoints')  * $resNumber; break;
                    case 49  : $newPoints = $this->getFConfig('resetMgPoints')  * $resNumber; break;
                    case 50  : $newPoints = $this->getFConfig('resetMgPoints')  * $resNumber; break;
                    case 64  : $newPoints = $this->getFConfig('resetDlPoints')  * $resNumber; break;
                    case 65  : $newPoints = $this->getFConfig('resetDlPoints')  * $resNumber; break;
                    case 66  : $newPoints = $this->getFConfig('resetDlPoints')  * $resNumber; break;
                    case 80  : $newPoints = $this->getFConfig('resetSumPoints') * $resNumber; break;
                    case 81  : $newPoints = $this->getFConfig('resetSumPoints') * $resNumber; break;
                    case 82  : $newPoints = $this->getFConfig('resetSumPoints') * $resNumber; break;
                    case 83  : $newPoints = $this->getFConfig('resetSumPoints') * $resNumber; break;
                    case 96  : $newPoints = $this->getFConfig('resetRfPoints')  * $resNumber; break;
                    case 97  : $newPoints = $this->getFConfig('resetRfPoints')  * $resNumber; break;
                    case 98  : $newPoints = $this->getFConfig('resetRfPoints')  * $resNumber; break;
                }

                switch($model->Class)
                {
                    case 0   : $charClass = 0;  break;
                    case 1   : $charClass = 0;  break;
                    case 2   : $charClass = 0;  break;
                    case 3   : $charClass = 0;  break;
                    case 16  : $charClass = 16; break;
                    case 17  : $charClass = 16; break;
                    case 18  : $charClass = 16; break;
                    case 19  : $charClass = 16; break;
                    case 32  : $charClass = 32; break;
                    case 33  : $charClass = 32; break;
                    case 34  : $charClass = 32; break;
                    case 35  : $charClass = 32; break;
                    case 48  : $charClass = 48; break;
                    case 49  : $charClass = 48; break;
                    case 50  : $charClass = 48; break;
                    case 64  : $charClass = 64; break;
                    case 65  : $charClass = 64; break;
                    case 66  : $charClass = 64; break;
                    case 80  : $charClass = 80; break;
                    case 81  : $charClass = 80; break;
                    case 82  : $charClass = 80; break;
                    case 83  : $charClass = 80; break;
                    case 96  : $charClass = 96; break;
                    case 97  : $charClass = 96; break;
                    case 98  : $charClass = 96; break;
                }

                if($model->$resColumn == 0)
                    $model->$resColumn = 1;
                else
                    $model->$resColumn;

                if($this->getFConfig('resetPayType') == 1)
                    $resPrice = $this->getFConfig('resetPayDynamic') * $model->$resColumn;
                else
                    $resPrice = $this->getFConfig('resetPayFixed');

                $totalPrice = $model->Money - $resPrice;

                if($model->getOInfo(Yii::app()->user->username,Yii::app()->user->char) == 1)
                {
                    Yii::app()->user->setFlash('delete', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'For reset your character, he must be offline'));
                    $this->refresh();
                }
                elseif($totalPrice < 0)
                {
                    Yii::app()->user->setFlash('delete', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'The character is not enough money'));
                    $this->refresh();
                }
                elseif($model->cLevel < $this->getFConfig('resetLevel'))
                {
                    Yii::app()->user->setFlash('delete', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Character level is too low'));
                    $this->refresh();
                }
                else
                {
                    $reset = array();
                    $reset['cLevel']       = '1';
                    $reset['LevelUpPoint'] = $newPoints;
                    $reset['Experience']   = '0';
                    $reset['Money']        = $totalPrice;
                    $reset['PkCount']      = '0';
                    $reset['PkLevel']      = '3';
                    $reset['PkTime']       = '0';
                    $reset['MapNumber']    = '0';
                    $reset['MapPosX']      = '133';
                    $reset['MapPosY']      = '120';
                    $reset[$resColumn]     = $resNumber;

                    if($getClass->getCClass($model->Class,1) == 80 || $getClass->getCClass($model->Class,1) == 81 || $getClass->getCClass($model->Class,1) == 82 || $getClass->getCClass($model->Class,1) == 83)
                    {
                        $reset['MapNumber']    = '51';
                        $reset['MapPosX']      = '133';
                        $update['MapPosY']     = '120';
                    }
                    elseif($getClass->getCClass($model->Class,1) == 32 || $getClass->getCClass($model->Class,1) == 33 || $getClass->getCClass($model->Class,1) == 34 || $getClass->getCClass($model->Class,1) == 35)
                    {
                        $reset['MapNumber']    = '3';
                        $reset['MapPosX']      = '175';
                        $reset['MapPosY']      = '112';
                    }

                    if($this->getFConfig('resetInvType') == 1)
                    {
                        $inventory = (DefaultClassType::getInventory($charClass));
                        $query="UPDATE Character SET Inventory=0x$inventory WHERE Name='".Yii::app()->user->char."'";
                        $command = Yii::app()->db->createCommand($query);
                        $command->execute();
                    }

                    if($this->getFConfig('resetMlType') == 1)
                    {
                        $magicList = DefaultClassType::getMList($charClass);
                        $query="UPDATE Character SET MagicList=0x$magicList WHERE Name='".Yii::app()->user->char."'";
                        $command = Yii::app()->db->createCommand($query);
                        $command->execute();
                    }


                    if($this->getFConfig('resetPtType') == 1)
                    {
                        $reset['Strength']     = $getClass->getCClass($model->Class,6);
                        $reset['Dexterity']    = $getClass->getCClass($model->Class,7);
                        $reset['Vitality']     = $getClass->getCClass($model->Class,8);
                        $reset['Energy']       = $getClass->getCClass($model->Class,9);
                        $reset['Leadership']   = $getClass->getCClass($model->Class,10);
                    }

                    Character::model()->updateAll($reset, 'AccountID =:AccountID AND Name=:Name',array(':AccountID'=>Yii::app()->user->username, ':Name'=>Yii::app()->user->char));
                    Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset is successful'));
                    $this->refresh();
                }
            }

            $this->pageTitle = Yii::app()->user->username.' / '
                .Yii::app()->user->char.' / '
                .Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Control panel').' / '
                .Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset character').' / '.
                $this->getFConfig('serverName');

            $this->breadcrumbs=array(
                Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Control panel'),
                Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset')
            );

            $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset character');

            $this->renderPartial('block/reset',array('model'=>$model),false,true);
        }
    }

    private function getVoting()
    {
        $model = $this->loadVModel();

        $this->pageTitle = Yii::app()->user->username.' / '
            .Yii::app()->user->char.' / '
            .Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Control panel').' / '
            .Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Voting').' / '.
            $this->getFConfig('serverName');

        $this->breadcrumbs=array(
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Control panel'),
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Voting')
        );

        $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Voting');

        $this->renderPartial('block/modal/voting',array(
           'model'=>$model
        ));
    }

    public function actionReport()
    {
        $this->pageTitle = Yii::app()->user->username.' / '
            .Yii::app()->user->char.' / '
            .Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Control panel').' / '
            .Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Ticket system').' / '.
            $this->getFConfig('serverName');

        $this->breadcrumbs=array(
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Control panel'),
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Ticket system')
        );

        $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Ticket system');

        $this->render('report');
    }

    private function getOpenTickets()
    {
        $model = FAI_TICKETS::model()->findAll(array(
            'select'=>'id, topic, date, priority',
            'condition'=>'memb___id=:memb___id AND status=:status',
            'params'=>array(':memb___id'=>Yii::app()->user->username, ':status'=>0)
        ));

        $this->renderPartial('block/report/open',array('model'=>$model));
    }

    private function getClosedTickets()
    {
        $model = FAI_TICKETS::model()->findAll(array(
            'select'=>'id, topic, date, priority',
            'condition'=>'memb___id=:memb___id AND status=:status',
            'params'=>array(':memb___id'=>Yii::app()->user->username, ':status'=>1)
        ));

        $this->renderPartial('block/report/open',array('model'=>$model));
    }


    private function getCreateTicket()
    {
        $model  = new FAI_TICKETS;

        $this->performAjaxValidation($model);

        if(isset($_POST['FAI_TICKETS']))
        {
            $model->attributes   = $_POST['FAI_TICKETS'];

            if($this->getFConfig('db_driver') == 'dblib')
            {
                $table = 'FAI_TICKETS';
                $status = 0;
                $query="INSERT INTO $table (topic,memb___id,character,date,ip,status,description,priority)
                  VALUES(N?,N?,N?,?,?,?,N?,?)";
                $command=Yii::app()->db->createCommand($query);
                $command->bindParam(1,$model->topic, PDO::PARAM_STR);
                $command->bindParam(2,Yii::app()->user->username,PDO::PARAM_STR);
                $command->bindParam(3,Yii::app()->user->char,PDO::PARAM_STR);
                $command->bindParam(4,time(),PDO::PARAM_STR);
                $command->bindParam(5,Yii::app()->request->userHostAddress,PDO::PARAM_STR);
                $command->bindParam(6,$status,PDO::PARAM_STR);
                $command->bindParam(7,$model->description,PDO::PARAM_STR);
                $command->bindParam(8,$model->priority,PDO::PARAM_STR);

                if($model->validate())
                {
                    $command->execute();
                    Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Your message was accepted for review'));
                    $this->redirect(array('report'));
                }
            }
            else
            {
                $model->memb___id    = Yii::app()->user->username;
                $model->character    = Yii::app()->user->char;
                $model->date         = time();
                $model->ip           = Yii::app()->request->userHostAddress;
                $model->status       = 0;
                $model->description = $model->description;

                if($model->save())
                {
                    Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Your message was accepted for review'));
                    $this->redirect(array('report'));
                }
            }
        }

        $this->pageTitle = Yii::app()->user->username.' / '.
            Yii::app()->user->char.' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Control panel').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Ticket system').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Report').' / '.
            $this->getFConfig('serverName');

        $this->breadcrumbs=array(
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Control panel'),
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Ticket system'),
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Create ticket')
        );

        $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Write administration');

        Yii::app()->clientScript->scriptMap=array(
            'jquery.js'=>false,
        );

        $this->renderPartial('block/report/_create_reportForm',array(
            'model'=>$model
        ));
    }

    private function getTicket($id)
    {
        $model = $this->loadModel($id);
        $post  = new FAI_TICKETS_POST;

        $this->performAjaxValidation($post);

        if(isset($_POST['FAI_TICKETS_POST']) && $model->memb___id == Yii::app()->user->username)
        {
            if($this->getFConfig('db_driver') == 'dblib')
            {
                if($_POST['FAI_TICKETS_POST']['message'] != '')
                {
                    $table = 'FAI_TICKETS_POST';
                    $sender = 0;
                    $query="INSERT INTO $table (message,ticket_id,date,name,ip,sender)
                  VALUES(N?,?,?,N?,N?,?)";
                    $command=Yii::app()->db->createCommand($query);
                    $command->bindParam(1,$_POST['FAI_TICKETS_POST']['message'], PDO::PARAM_STR);
                    $command->bindParam(2,$id,PDO::PARAM_STR);
                    $command->bindParam(3,time(),PDO::PARAM_STR);
                    $command->bindParam(4,Yii::app()->user->username,PDO::PARAM_STR);
                    $command->bindParam(5,Yii::app()->request->userHostAddress,PDO::PARAM_STR);
                    $command->bindParam(6,$sender,PDO::PARAM_STR);

                    if($command->execute())
                    {
                        Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'The message was sent'));
                        $this->refresh();
                    }
                }
            }
            else
            {
                $post->message = $_POST['FAI_TICKETS_POST']['message'];
                $post->ticket_id = $id;
                $post->date = time();
                $post->name = Yii::app()->user->username;
                $post->ip   = Yii::app()->request->userHostAddress;
                $post->sender = 0;

                if($post->save())
                {
                    Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'The message was sent'));
                    $this->refresh();
                }
            }
        }

        Yii::app()->clientScript->scriptMap=array(
            'jquery.js'=>false,
        );

        $this->renderPartial('block/report/view/viewTicket',array(
            'model'=>$model,
            'post'=>$post
        ));
    }

    public function actionEditpost($id)
    {
        $model = $this->loadPostModel($id);

        $this->performAjaxValidation($model);

        if(isset($_POST['FAI_TICKETS_POST']))
        {
            $ptn= "!<script[^>]*>(.)*</script>!Uis";
            $model->message = preg_replace($ptn,"",$_POST['FAI_TICKETS_POST']['message']);
            $model->date        = time();
//            $model->photo       = Yii::app()->user->picture;
            $model->ip          = Yii::app()->request->userHostAddress;
            $model->upd_type    = 1;

            if($model->save())
            {
                Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Message')." ".
                    Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully')." ".
                    Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'updated'));
                $this->redirect(array('view', 'id'=>$model->ticket_id));
            }
        }

        $this->pageTitle = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Ticket system').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Edit message').' / '.
            $this->getFConfig('serverName');

        $this->pageH1 =  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Ticket system').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Edit message');

        $this->render('block/_postForm',array(
            'model'=>$model
        ));
    }

    public function actionDeletepost($id)
    {
        $model = $this->loadPostModel($id);
        $this->loadPostModel($id)->delete();

        if(!isset($_GET['ajax']))
        {
            Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Message')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'deleted'));
            $this->redirect(array('view', 'id'=>$model->ticket_id));
        }
        else
        {
            Yii::app()->user->setFlash('delete', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'An error has occurred').". <span class='o-h-l'>".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'FAI_ABOUT')."</span> #".$id." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'not removed').".");
            $this->redirect(array('view', 'id'=>$model->ticket_id));
        }
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(array('login'));
    }

    public function actionUpdate($id)
    {
        if(isset($id) && $id != '')
        {
            $nCheck = Character::model()->count('AccountID=:AccountID AND Name=:Name',
                array(':AccountID'=>Yii::app()->user->username,':Name'=>$id));

            if($nCheck)
            {
                Yii::app()->user->setState('char', $id);
                echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Selected character').' '.$id;
            }
            else
            {
                echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Character does not exist or it does not belong to you');
            }
        }
    }

    private function getVoteCheck()
    {
        $votes = file($this->getFConfig('voteURL'));

        if(!empty($votes))
        {
            foreach($votes as $line)
            {
                $entity = explode("\t", $line);

                $getVId = FAIMMOTOP::model()->count(array(
                    'condition'=>'vote_id=:vote_id',
                    'params'=>array('vote_id'=>$entity['0'])
                ));

                switch($entity['4'])
                {
                    case 1 : $award = $this->getFConfig('voteDefAward'); break;
                    case 2 : $award = $this->getFConfig('voteSmsAward'); break;
                }

                if($getVId <= 0)
                {
                    $mmotop = new FAIMMOTOP;

                    $mmotop->vote_id   = $entity['0'];
                    $mmotop->vote_acc  = $entity['3'];
                    $mmotop->vote_date = strtotime($entity['1']);
                    $mmotop->vote_ip   = $entity['2'];
                    $mmotop->vote_type = $entity['4'];

                    if($mmotop->save())
                        self::voteRmosCheck($entity['3'],$award);

                    if(strtolower($entity['3']) == strtolower(Yii::app()->user->username))
                    {
                        $result[] = $award;
                    }
                }
            }

            if(is_array($result) && sizeof($result) > 0)
            {
                echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Congratulations! You enrolled').' '.
                    Character::getRCount(array_sum($result), array(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'credit'),
                        Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'credits '),
                        Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'credits  ')));;
            }
            else
            {
                echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'List of votes has been successfully updated').' '.
                    Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'but your votes are not found');
            }
        }
        else
        {
            echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Vote list is empty');
        }
    }

    private function getRCTransfer()
    {
        if($this->checkOnline() == '0')
        {
            $getMemb = Account::model()->count(array(
                'condition'=>'memb___id=:memb___id',
                'params'=>array('memb___id'=>Yii::app()->user->username)
            ));

            if($getMemb > 0)
            {
                $model = Account::model()->find(array(
                    'select'=>'Credits,web_credits',
                    'condition'=>'memb___id=:memb___id',
                    'params'=>array(':memb___id'=>Yii::app()->user->username)
                ));

                if($model->web_credits != '0' && $model->web_credits != NULL)
                {
                    $reset = '0';
                    $query='UPDATE MEMB_INFO SET web_credits=:award WHERE memb___id=:id';

                    $command = Yii::app()->db->createCommand($query);
                    $command->bindParam(':award',$reset,PDO::PARAM_STR);
                    $command->bindParam(':id',Yii::app()->user->username,PDO::PARAM_STR);

                    if($command->execute())
                    {
                        if($model->Credits == '0' || $model->Credits == NULL || $model->Credits == '-100')
                        {
                            $query2 = 'UPDATE MEMB_INFO SET Credits=:credits WHERE memb___id=:id';
                        }
                        else
                        {
                            $query2 = 'UPDATE MEMB_INFO SET Credits+=:credits WHERE memb___id=:id';
                        }

                        $command = Yii::app()->db->createCommand($query2);
                        $command->bindParam(':credits',$model->web_credits,PDO::PARAM_STR);
                        $command->bindParam(':id',Yii::app()->user->username,PDO::PARAM_STR);
                        $command->execute();

                        echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Transfer executed successfully');
                    }
                    else
                    {
                        $query  = 'UPDATE MEMB_INFO SET web_credits=:wcredits WHERE memb___id=:id';
                        $command = Yii::app()->db->createCommand($query);
                        $command->bindParam(':wcredits',Yii::app()->user->username,PDO::PARAM_STR);
                        $command->execute();

                        echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'An error has occurred');
                    }
                }
                else
                {
                    echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'No credits for transfer');
                }
            }
            else
            {
                echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Account not found');
            }
        }
        else
        {
            echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'For the transfer of credits you need to get out of the game');
        }
    }

    public function loadSModel($guid)
    {
        $model = Security::model()->findByAttributes(array('memb_guid'=>$guid));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function loadCModel()
    {
        $model = Character::model()->find(array(
            'select'=>'Strength,Dexterity,Vitality,Energy,Leadership,Money,cLevel,Class,LevelUpPoint,'.$this->getFConfig('reset_col').','.$this->getFConfig('greset_col').'',
            'condition'=>'AccountID=:AccountID AND Name=:Name',
            'params'=>array(':AccountID'=>Yii::app()->user->username,':Name'=>Yii::app()->user->char)
        ));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function loadVModel()
    {
        $model = Account::model()->find(array(
            'select'=>'Credits,web_credits',
            'condition'=>'memb___id=:memb___id',
            'params'=>array(':memb___id'=>Yii::app()->user->username)
        ));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function loadPostModel($id)
    {
        $model = FAI_TICKETS_POST::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function loadModel($id)
    {
        $model = FAI_TICKETS::model()->find(array(
            'select'=>'*',
            'condition'=>'id=:id AND memb___id=:memb___id',
            'params'=>array(':id'=>$id,':memb___id'=>Yii::app()->user->username)
        ));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function loadAModel($id)
    {
        $model = FAI_CPHOME::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    private static function voteCheck($id,$award)
    {
        $getMemb = MEMBCREDITS::model()->findAll(array(
            'condition'=>'memb___id=:memb___id',
            'params'=>array('memb___id'=>$id)
        ));

        if((int)$getMemb > 0)
        {
            $query="UPDATE MEMB_CREDITS SET credits+=".$award." WHERE memb___id='$id'";
            $command = Yii::app()->db->createCommand($query);
            $command->execute();
        }
        else
        {
            $membcred = new MEMBCREDITS;
            $membcred->memb___id = $id;
            $membcred->credits   = $award;
            $membcred->save();
        }
    }

    private function voteRmosCheck($id,$award)
    {
        $getMemb = Account::model()->count(array(
            'condition'=>'memb___id=:memb___id',
            'params'=>array('memb___id'=>$id)
        ));

        if($getMemb > 0)
        {
            $getCol = Account::model()->find(array(
                'select'=>'web_credits',
                'condition'=>'memb___id=:memb___id',
                'params'=>array(':memb___id'=>$id)
            ));

            if($getCol->web_credits == NULL)
                $query='UPDATE MEMB_INFO SET web_credits=:award WHERE memb___id=:id';
            else
                $query='UPDATE MEMB_INFO SET web_credits+=:award WHERE memb___id=:id';

            $command = Yii::app()->db->createCommand($query);
            $command->bindParam(':award',$award,PDO::PARAM_STR);
            $command->bindParam(':id',$id,PDO::PARAM_STR);
            $command->execute();
        }
    }

    protected function getSCharInfo()
    {
        return Character::model()->find(array(
            'select'=>'cLevel,'.$this->getFConfig('reset_col').','.$this->getFConfig('greset_col').',Class,Money,LevelUpPoint,Strength,Dexterity,Energy,Leadership',
            'condition'=>'AccountID=:AccountID AND Name=:Name',
            'params'=>array(':AccountID'=>Yii::app()->user->username,':Name'=>Yii::app()->user->char)
        ));
    }

    private function checkOnline()
    {
        $model = MEMBSTAT::model()->find(array(
            'select'=>'ConnectStat',
            'condition'=>'memb___id=:memb___id',
            'params'=>array(':memb___id'=>Yii::app()->user->username)
        ));

        return $model->ConnectStat;
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='cp-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    private static function getNumber($string)
    {
       return preg_replace("/[^0-9]/", '', $string);
    }

    public function checkCS($name)
    {
        if($name == Yii::app()->user->char)
            echo 'selected-char ';
    }

    public function getValue($name)
    {
        if($name != '')
            $result = $name;
        else
            $result = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Not specified');

        return $result;
    }

    public function hideEmail($email)
    {
        $array = explode('@',$email);
        $emailName = str_split($array['0']);

        foreach($emailName as $key => $char)
        {
            if($key >= 1)
                echo '*';
            else
                echo $char;
        }

        echo '@'.$array['1'];
    }

    public function getPaymentMethodImage($method,$format='png')
    {
        echo $this->getTemplate('core').'images/payment/'.$method.'.'.$format;
    }

    public function getPaymentMethods()
    {
        return $methods = array_slice(scandir('themes/'.$this->getFConfig('f_theme').'/frontend/cp/block/payment/methods'),2);
    }
}