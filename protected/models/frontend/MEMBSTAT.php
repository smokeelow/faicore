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
class MEMBSTAT extends CActiveRecord
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
			array('memb___id', 'required'),
			array('ConnectStat', 'numerical', 'integerOnly'=>true),
			array('memb___id', 'length', 'max'=>10),
			array('ServerName', 'length', 'max'=>20),
			array('IP', 'length', 'max'=>15),
			array('ConnectTM, DisConnectTM', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('memb___id, ConnectStat, ServerName, IP, ConnectTM, DisConnectTM', 'safe', 'on'=>'search'),
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
            'mainChar' => array(self::HAS_ONE,   'AccountCharacter',  'Id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'memb___id' => 'Memb',
			'ConnectStat' => 'Connect Stat',
			'ServerName' => 'Server Name',
			'IP' => 'Ip',
			'ConnectTM' => 'Connect Tm',
			'DisConnectTM' => 'Dis Connect Tm',
		);
    }

    public static function getOnline()
    {
        return self::model()->count("ConnectStat=:stat", array("stat" => 1));
    }
}