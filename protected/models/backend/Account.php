<?php
class Account extends CActiveRecord
{
    public $actions;

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
			array('memb___id, memb__pwd, memb_name, mail_addr', 'required'),
            array('memb___id, mail_addr, memb_name', 'unique'),
            array('memb__pwd', 'length', 'min'=>6),
            array('mail_addr', 'email'),
            array('memb___id, memb__pwd, memb_name', 'checkType'),
			array('cspoints, VipType, confirmed, Country, Gender, SecretQuestion', 'numerical', 'integerOnly'=>true),
			array('memb___id, memb__pwd, memb_name', 'length', 'max'=>10),
			array('sno__numb', 'length', 'max'=>13),
			array('post_code', 'length', 'max'=>6),
			array('addr_info, addr_deta, mail_addr, fpas_ques, fpas_answ, activation_id', 'length', 'max'=>50),
			array('tel__numb, coupon', 'length', 'max'=>20),
			array('phon_numb', 'length', 'max'=>15),
			array('job__code', 'length', 'max'=>2),
			array('mail_chek, bloc_code, ctl1_code', 'length', 'max'=>1),
			array('JoinDate', 'length', 'max'=>23),
			array('SecretAnswer, reg_date, status', 'length', 'max'=>100),
			array('appl_days, modi_days, out__days, true_days, VipStart, VipDays', 'safe'),
			array('memb___id, memb__pwd, mail_addr, bloc_code, ctl1_code', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(

		);
	}

	public function attributeLabels()
	{
		return array(
			'memb_guid' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Unique identifier'),
			'memb___id' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Account name'),
			'memb__pwd' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Password'),
			'memb_name' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Name'),
			'sno__numb' => 'Sno Numb',
			'post_code' => 'Post Code',
			'addr_info' => 'Addr Info',
			'addr_deta' => 'Addr Deta',
			'tel__numb' => 'Tel Numb',
			'phon_numb' => 'Phon Numb',
			'mail_addr' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'E-Mail'),
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
			'cspoints' => 'Cspoints',
			'VipType' => 'Vip Type',
			'VipStart' => 'Vip Start',
			'VipDays' => 'Vip Days',
			'JoinDate' => 'Join Date',
			'activation_id' => 'Activation',
			'confirmed' => 'Confirmed',
			'Country' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Country'),
			'Gender' => 'Gender',
			'SecretAnswer' => 'Secret Answer',
			'SecretQuestion' => 'Secret Question',
			'coupon' => 'Coupon',
		);
	}


    public function checkType()
    {
        if (!preg_match ('/^[a-z0-9]+$/is', $this->memb___id))
        {
            $this->addError('memb___id', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Allowed only latin characters and numbers'));
        }

        if(!preg_match ('/^[a-z0-9]+$/is', $this->memb__pwd))
        {
            $this->addError('memb__pwd', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Allowed only latin characters and numbers'));
        }

        if(!preg_match ('/^[a-z0-9]+$/is', $this->memb_name))
        {
            $this->addError('memb_name', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Allowed only latin characters and numbers'));
        }
    }

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('memb___id',$this->memb___id,true);
		$criteria->compare('memb__pwd',$this->memb__pwd,true);
		$criteria->compare('mail_addr',$this->mail_addr,true);
		$criteria->compare('bloc_code',$this->bloc_code,true);
		$criteria->compare('ctl1_code',$this->ctl1_code,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=> 50,
                'pageVar'=>'page',
            ),
        ));
	}

    public static function getAAccounts()
    {
        return self::model()->count('memb_guid >= :guid', array(':guid'=>1));
    }

    public function getFinderAccInfo($id)
    {
        return $this->find(array(
            'select'=>'memb__pwd,mail_addr,bloc_code,usr_avatar,web_credits,Credits',
            'condition'=>'memb___id=:memb___id',
            'params'=>array(':memb___id'=>$id)
        ));
    }

    public static function getAChars($acc)
    {
        $chars = Character::model()->findAll(array(
            'select'=>'Name',
            'condition'=>'AccountID=:memb___id',
            'params'=>array(':memb___id'=>$acc)
        ));

        foreach($chars as $key => $char)
        {
            if($key+1 != sizeof($chars))
                echo CHtml::link($char->Name,array('char', 'id'=>$char->Name), array('class'=>'char-link', 'title'=>$char->Name)).', ';
            else
                echo CHtml::link($char->Name,array('char', 'id'=>$char->Name), array('class'=>'char-link', 'title'=>$char->Name));
        }
    }

}