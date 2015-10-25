<?php

/**
 * This is the model class for table "MuCastle_SIEGE_GUILDLIST".
 *
 * The followings are the available columns in table 'MuCastle_SIEGE_GUILDLIST':
 * @property integer $MAP_SVR_GROUP
 * @property string $GUILD_NAME
 * @property integer $GUILD_ID
 * @property boolean $GUILD_INVOLVED
 */
class MuCastleSIEGEGUILDLIST extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MuCastleSIEGEGUILDLIST the static model class
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
		return 'MuCastle_SIEGE_GUILDLIST';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MAP_SVR_GROUP, GUILD_NAME, GUILD_ID, GUILD_INVOLVED', 'required'),
			array('MAP_SVR_GROUP, GUILD_ID', 'numerical', 'integerOnly'=>true),
			array('GUILD_NAME', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('MAP_SVR_GROUP, GUILD_NAME, GUILD_ID, GUILD_INVOLVED', 'safe', 'on'=>'search'),
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
			'GUILD_NAME' => 'Guild Name',
			'GUILD_ID' => 'Guild',
			'GUILD_INVOLVED' => 'Guild Involved',
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
		$criteria->compare('GUILD_NAME',$this->GUILD_NAME,true);
		$criteria->compare('GUILD_ID',$this->GUILD_ID);
		$criteria->compare('GUILD_INVOLVED',$this->GUILD_INVOLVED);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}