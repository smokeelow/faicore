<?php

/**
 * This is the model class for table "MEMB_STAT".
 *
 * The followings are the available columns in table 'MEMB_STAT':
 * @property string $memb___id
 * @property integer $ConnectStat
 * @property string $ServerName
 * @property string $IP
 * @property string $ConnectTM
 * @property string $DisConnectTM
 */
class MEMBSTAT_1 extends FirstActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MEMBSTAT the static model class
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
		return 'MEMB_STAT';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ConnectStat', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
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

    public static function getOnline()
    {
        return self::model()->count('ConnectStat=:stat', array('stat' => 1));
    }
}