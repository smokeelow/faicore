<?php

/**
 * This is the model class for table 'Character'.
 *
 * The followings are the available columns in table 'Character':
 * @property integer $cLevel
 */
class Character_3 extends ThirdActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Character the static model class
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
		return 'Character';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cLevel', 'numerical', 'integerOnly'=>true),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
		);
	}



    public static function getAllChars()
    {
        return self::model()->count('cLevel >= :level', array(':level'=>1));
    }


}