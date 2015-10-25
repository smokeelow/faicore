<?php

/**
 * This is the model class for table "GuildMember".
 *
 * The followings are the available columns in table 'GuildMember':
 * @property string $Name
 * @property string $G_Name
 * @property integer $G_Level
 * @property integer $G_Status
 */
class GuildMember extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GuildMember the static model class
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
		return 'GuildMember';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, G_Name', 'required'),
			array('G_Level, G_Status', 'numerical', 'integerOnly'=>true),
			array('Name', 'length', 'max'=>10),
			array('G_Name', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Name, G_Name, G_Level, G_Status', 'safe', 'on'=>'search'),
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
			'Name' => 'Name',
			'G_Name' => 'G Name',
			'G_Level' => 'G Level',
			'G_Status' => 'G Status',
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

		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('G_Name',$this->G_Name,true);
		$criteria->compare('G_Level',$this->G_Level);
		$criteria->compare('G_Status',$this->G_Status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}