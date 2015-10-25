<?php
class Security extends CActiveRecord
{
    public $new_pwd;

    /**
    * Returns the static model of the specified AR class.
    * @param string $className active record class name.
    * @return Account the static model class
    */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
    * @return string the associated database table name
    */
    public function tableName()
    {
        return 'MEMB_INFO';
    }

    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
		return array(
            array('new_pwd', 'required'),
            array('new_pwd', 'checkType'),
            array('new_pwd, memb_guid', 'length', 'max'=>10),
            array('new_pwd', 'length', 'min'=>4),
        );
    }

    public function attributeLabels()
    {
		return array(
            'new_pwd'   => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'New password'),
         );
    }

    public function checkType()
    {
        if (!preg_match ('/^[a-z0-9]+$/is', $this->new_pwd))
        {
            $this->addError('new_pwd', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Allowed only latin characters and numbers'));
        }
    }
}