<?php

/**
 * This is the model class for table "MuCastle_DATA".
 *
 * The followings are the available columns in table 'MuCastle_DATA':
 * @property integer $MAP_SVR_GROUP
 * @property string $SIEGE_START_DATE
 * @property string $SIEGE_END_DATE
 * @property boolean $SIEGE_GUILDLIST_SETTED
 * @property boolean $SIEGE_ENDED
 * @property boolean $CASTLE_OCCUPY
 * @property string $OWNER_GUILD
 * @property string $MONEY
 * @property integer $TAX_RATE_CHAOS
 * @property integer $TAX_RATE_STORE
 * @property integer $TAX_HUNT_ZONE
 */
class MuCastleDATA extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MuCastleDATA the static model class
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
		return 'MuCastle_DATA';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MAP_SVR_GROUP, SIEGE_START_DATE, SIEGE_END_DATE, SIEGE_GUILDLIST_SETTED, OWNER_GUILD', 'required'),
			array('MAP_SVR_GROUP, TAX_RATE_CHAOS, TAX_RATE_STORE, TAX_HUNT_ZONE', 'numerical', 'integerOnly'=>true),
			array('OWNER_GUILD', 'length', 'max'=>8),
			array('MONEY', 'length', 'max'=>19),
			array('SIEGE_ENDED, CASTLE_OCCUPY', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('MAP_SVR_GROUP, SIEGE_START_DATE, SIEGE_END_DATE, SIEGE_GUILDLIST_SETTED, SIEGE_ENDED, CASTLE_OCCUPY, OWNER_GUILD, MONEY, TAX_RATE_CHAOS, TAX_RATE_STORE, TAX_HUNT_ZONE', 'safe', 'on'=>'search'),
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
			'MAP_SVR_GROUP' => 'Map Svr Group',
			'SIEGE_START_DATE' => 'Siege Start Date',
			'SIEGE_END_DATE' => 'Siege End Date',
			'SIEGE_GUILDLIST_SETTED' => 'Siege Guildlist Setted',
			'SIEGE_ENDED' => 'Siege Ended',
			'CASTLE_OCCUPY' => 'Castle Occupy',
			'OWNER_GUILD' => 'Owner Guild',
			'MONEY' => 'Money',
			'TAX_RATE_CHAOS' => 'Tax Rate Chaos',
			'TAX_RATE_STORE' => 'Tax Rate Store',
			'TAX_HUNT_ZONE' => 'Tax Hunt Zone',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('MAP_SVR_GROUP',$this->MAP_SVR_GROUP);
		$criteria->compare('SIEGE_START_DATE',$this->SIEGE_START_DATE,true);
		$criteria->compare('SIEGE_END_DATE',$this->SIEGE_END_DATE,true);
		$criteria->compare('SIEGE_GUILDLIST_SETTED',$this->SIEGE_GUILDLIST_SETTED);
		$criteria->compare('SIEGE_ENDED',$this->SIEGE_ENDED);
		$criteria->compare('CASTLE_OCCUPY',$this->CASTLE_OCCUPY);
		$criteria->compare('OWNER_GUILD',$this->OWNER_GUILD,true);
		$criteria->compare('MONEY',$this->MONEY,true);
		$criteria->compare('TAX_RATE_CHAOS',$this->TAX_RATE_CHAOS);
		$criteria->compare('TAX_RATE_STORE',$this->TAX_RATE_STORE);
		$criteria->compare('TAX_HUNT_ZONE',$this->TAX_HUNT_ZONE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}