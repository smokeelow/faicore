<?php
class Account extends CActiveRecord
{
    public $new_email;
    public $new_name;
    public $new_password;
    public $old_password;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'MEMB_INFO';
	}

	public function rules()
	{
		return array(
			array('memb__pwd, memb_name, mail_addr', 'required'),
            array('mail_addr, memb_name', 'unq', 'userIdentifier'),
            array('memb___id,memb__pwd', 'length', 'min'=>6),
            array('memb___id', 'unq' , 'regId'),
            array('mail_addr, new_email', 'email'),
            array('new_email', 'checkUniqueEmail'),
            array('usr_avatar', 'url'),
            array('old_password', 'checkPassword'),
            array('new_password', 'checkOldPwd',),
            array('usr_avatar', 'checkImage'),
            array('memb__pwd,memb_name,mail_addr,new_email,new_name,new_password,old_password','filter',
                'filter'=>array($obj=new CHtmlPurifier,'purify')),
            array('web_credits,Credits,usr_bantime,sno__numb,phon_numb,tel__numb', 'numerical', 'integerOnly'=>true),
            array('memb___id, memb__pwd, memb_name,new_password,new_name', 'checkType'),
			array('memb___id, memb__pwd, memb_name', 'length', 'max'=>10),
			array('sno__numb', 'length', 'max'=>13),
			array('post_code', 'length', 'max'=>6),
			array('addr_info, addr_deta, mail_addr, fpas_ques, fpas_answ', 'length', 'max'=>50),
			array('tel__numb', 'length', 'max'=>20),
			array('phon_numb', 'length', 'max'=>15),
            array('usr_country,usr_city', 'length', 'max'=>30),
            array('usr_avatar', 'length', 'max'=>255),
			array('job__code', 'length', 'max'=>2),
			array('mail_chek, bloc_code, ctl1_code', 'length', 'max'=>1),
			array('reg_date, status', 'length', 'max'=>100),
			array('appl_days, modi_days, out__days, true_days, VipStart, VipDays', 'safe'),
			array('memb_guid, memb___id, memb__pwd, memb_name, sno__numb, post_code, addr_info, addr_deta, tel__numb, phon_numb, mail_addr,
			fpas_ques, fpas_answ, job__code, appl_days, modi_days, out__days, true_days, mail_chek, bloc_code, ctl1_code, Country,
			Gender, SecretAnswer, SecretQuestion, coupon, reg_date, status', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array();
	}

	public function attributeLabels()
	{
		return array(
			'memb_guid' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Unique identifier').':',
			'memb___id' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Account name').':',
			'memb__pwd' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Password').':',
			'memb_name' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Nickname').':',
			'sno__numb' => 'Sno Numb',
			'post_code' => 'Post Code',
			'addr_info' => 'Addr Info',
			'addr_deta' => 'Addr Deta',
			'tel__numb' => 'Tel Numb',
			'phon_numb' => 'Phon Numb',
			'mail_addr' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'E-Mail').':',
			'fpas_ques' => 'Fpas Ques',
			'fpas_answ' => 'Fpas Answ',
			'job__code' => 'Job Code',
			'appl_days' => 'Appl Days',
			'modi_days' => 'Modi Days',
			'out__days' => 'Out Days',
			'true_days' => 'True Days',
			'mail_chek' => 'Mail Chek',
			'bloc_code' => 'Bloc Code',
			'ctl1_code' => 'Ctl1 Code',
			'Country' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Country').':',
			'Gender' => 'Gender',
			'SecretAnswer' => 'Secret Answer',
			'SecretQuestion' => 'Secret Question',
			'coupon' => 'Coupon',
            'new_email'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'New address').':',
            'usr_avatar'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Avatar').':',
            'new_name'=> Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Nickname').':',
            'new_password'=> Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'New password').':',
            'old_password'=> Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Old password').':'
		);
	}

    public function checkOldPwd()
    {
        if($this->new_password != '' && empty($this->old_password))
        {
            $this->addError('new_password', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'You need to enter your old password'));
        }
    }

    public function checkUniqueEmail()
    {
        if(!empty($this->new_email))
        {
            $count = self::count('mail_addr=:mail_addr AND memb___id!=:memb___id',array(
                ':mail_addr'=>$this->new_email,
                ':memb___id'=>Yii::app()->user->username
            ));

            if($count)
            {
                $this->addError('new_email', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'This address is already in use'));
            }
        }
    }

    public function unq($attribute,$params=array())
    {
        if(is_array($params) && !empty($params))
        {
            switch($params['0'])
            {
                case 'userIdentifier':  $validator = $this->checkWithAuth($attribute);          break;
                case 'regId':           $validator = $this->checkForRegistration($attribute);   break;

            }

            return $validator;
        }
    }

    private function checkForRegistration($attribute)
    {
        if(!isset(Yii::app()->user->username))
        {
            $find = $this->findAll(array(
                'select'=>'LOWER(memb___id)',
                'condition'=>'memb___id=:memb___id',
                'params'=>array(':memb___id'=>strtolower($this->$attribute))
            ));

            if($this->$attribute == '')
            {
                $this->addError($attribute,Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Need fill field').' '.$this->getAttributeLabel($attribute));
            }
            elseif($find)
            {
                $this->addError($attribute,$this->getAttributeLabel($attribute).' "'.$this->$attribute.'" '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'already in use'));
            }
        }
    }

    private function checkWithAuth($attribute)
    {
        if(isset(Yii::app()->user->username))
        {
            if(!empty($attribute))
            {

                $find = $this->count(''.$attribute.'=:'.$attribute.' AND memb___id != :memb___id',
                    array(
                        ':'.$attribute=>strtolower($this->$attribute),
                        ':memb___id'=>strtolower(Yii::app()->user->username)
                    ));

                if($find)
                {
                    $this->addError($attribute,self::getAttributeLabel($attribute));
                }
            }
        }
        else
        {
            if(!empty($attribute))
            {
                $find = self::count($attribute.'=:'.$attribute,array(':'.$attribute=>$this->$attribute));

                if($find)
                {
                    $this->addError($attribute,$this->getAttributeLabel($attribute).' "'.$this->$attribute.'" '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'already in use'));;
                }
            }
        }
    }

    public function checkPassword()
    {
        if(!empty($this->old_password))
        {
            $model = self::find(array(
                'select'=>'memb__pwd',
                'condition'=>'memb___id=:memb___id',
                'params'=>array(':memb___id'=>Yii::app()->user->username)
            ));

            if($this->old_password != $model->memb__pwd)
            {
                $this->addError('old_password', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Password do not match'));
            }
        }
    }

    public function checkImage()
    {
        if(!empty($this->usr_avatar) && !is_array(@getimagesize($this->usr_avatar)))
        {
            $this->addError('usr_avatar', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'This URL does not point to a picture'));
        }
    }

    public function checkType($attribute)
    {
        if($this->$attribute !='' && !preg_match ('/^[a-z0-9]+$/is',$this->$attribute))
        {
            $this->addError($attribute, Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Allowed only latin characters and numbers'));
        }
    }

    public static function getAAccounts()
    {
        return self::count('memb_guid >= :guid', array(':guid'=>1));
    }

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('memb_guid',$this->memb_guid);
		$criteria->compare('memb___id',$this->memb___id,true);
		$criteria->compare('memb__pwd',$this->memb__pwd,true);
		$criteria->compare('memb_name',$this->memb_name,true);
		$criteria->compare('sno__numb',$this->sno__numb,true);
		$criteria->compare('post_code',$this->post_code,true);
		$criteria->compare('addr_info',$this->addr_info,true);
		$criteria->compare('addr_deta',$this->addr_deta,true);
		$criteria->compare('tel__numb',$this->tel__numb,true);
		$criteria->compare('phon_numb',$this->phon_numb,true);
		$criteria->compare('mail_addr',$this->mail_addr,true);
		$criteria->compare('fpas_ques',$this->fpas_ques,true);
		$criteria->compare('fpas_answ',$this->fpas_answ,true);
		$criteria->compare('job__code',$this->job__code,true);
		$criteria->compare('appl_days',$this->appl_days,true);
		$criteria->compare('modi_days',$this->modi_days,true);
		$criteria->compare('out__days',$this->out__days,true);
		$criteria->compare('true_days',$this->true_days,true);
		$criteria->compare('mail_chek',$this->mail_chek,true);
		$criteria->compare('bloc_code',$this->bloc_code,true);
		$criteria->compare('ctl1_code',$this->ctl1_code,true);
		$criteria->compare('VipType',$this->VipType);
		$criteria->compare('VipStart',$this->VipStart,true);
		$criteria->compare('VipDays',$this->VipDays,true);
		$criteria->compare('JoinDate',$this->JoinDate,true);
		$criteria->compare('activation_id',$this->activation_id,true);
		$criteria->compare('Country',$this->Country);
		$criteria->compare('Gender',$this->Gender);
		$criteria->compare('SecretAnswer',$this->SecretAnswer,true);
		$criteria->compare('SecretQuestion',$this->SecretQuestion);
		$criteria->compare('coupon',$this->coupon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public static function getCColumn($acc,$column)
    {
        $colVal = self::find(array(
            'select'=>$column,
            'condition'=>'memb___id=:memb___id',
            'params'=>array(':memb___id'=>$acc)
        ));

        if($colVal->$column == NULL || $colVal->$column == '')
        {
            $result = 0;
        }
        else
        {
            $result = ceil($colVal->$column);
        }

        return $result;
    }

    public static function checkUserPic()
    {
        $find = Account::model()->find(array(
            'select'=>'usr_avatar',
            'condition'=>'memb___id=:memb___id',
            'params'=>array(':memb___id'=>Yii::app()->user->username)
        ));

        if($find->usr_avatar != '')
        {
            return true;
        }
    }

    public static function userAvatar()
    {
        return Account::model()->find(array(
            'select'=>'usr_avatar',
            'condition'=>'memb___id=:memb___id',
            'params'=>array(':memb___id'=>Yii::app()->user->username)
        ));
    }

}