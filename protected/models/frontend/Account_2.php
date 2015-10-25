<?php

/**
 * This is the model class for table "MEMB_INFO".
 *
 * The followings are the available columns in table 'MEMB_INFO':
 * @property integer $memb_guid
 */
class Account_2 extends SecondActiveRecord
{
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

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
            array('memb___id', 'unique'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
		);
	}


    public static function getAAccounts()
    {
        return self::model()->count('memb_guid >= :guid', array(':guid'=>1));
    }
}