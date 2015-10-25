<?php

class Entrance extends CActiveRecord
{
    const ROLE_ADMIN = 'administrator';
    const ROLE_MODER = 'moderator';
    const ROLE_BANNED = 'banned';

    public $usr;
    public $pwd;
    public $adm_usr;
    public $usr_check;
    public $secEcode;
    private $_identity;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'FAI_ADM_GROUP';
    }

	public function rules()
	{
		return array(
			array('usr, pwd', 'lengthCheck'),
            array('usr', 'nameCheck'),
            array('pwd', 'authF'),
		);
	}

    public function lengthCheck()
    {
        if(strlen($this->usr) < 4) $this->addError('usr', ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Minimum number of characters').' 4');
        if(strlen($this->pwd) < 3) $this->addError('pwd', ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Minimum number of characters').' 3');
    }

    public function nameCheck()
    {
        $criteria = new CDbCriteria();
        $criteria->condition = "access=:access";
        $criteria->params = array(":access"=>"0");

        $position = self::model()->findAll($criteria);

        foreach ($position as $item)
        {
            $access = $item->access;
        }

        if($access != 0)
        {
            $this->addError('usr', ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Your account has been banned').'');
        }

        if($this->usr_check = self::model()->find('name=:name', array(':name'=>$this->usr)) == NULL)
        {
            $this->addError('usr', ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Incorrect login').'');
        }
    }

    public function authF()
    {
        if($this->usr == "") $this->addError('usr', ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Enter login').'');

        $this->adm_usr = self::model()->findByAttributes(array('name'=>$this->usr));

        if($this->adm_usr !== NULL)
        {
            $this->usr_check =  $this->adm_usr->name;
        }
        else
        {
            $this->usr_check = "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Guest')."";
        }


        $this->_identity = new UserIdentity($this->usr,$this->pwd);
        if(!$this->_identity->authenticate())
        {
            $this->addError('pwd',''.$this->usr_check.', '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'you enter an incorrect password').'');
        }
    }
}
