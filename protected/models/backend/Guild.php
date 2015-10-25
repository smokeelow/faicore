<?php

/**
 * This is the model class for table "Guild".
 *
 * The followings are the available columns in table 'Guild':
 * @property string $G_Name
 * @property string $G_Mark
 * @property integer $G_Score
 * @property string $G_Master
 * @property integer $G_Count
 * @property string $G_Notice
 * @property integer $Number
 * @property integer $G_Type
 * @property integer $G_Rival
 * @property integer $G_Union
 * @property string $G_Warehouse
 * @property integer $G_WHPassword
 * @property integer $G_WHMoney
 */
class Guild extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Guild the static model class
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
		return 'Guild';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('G_Name', 'required'),
			array('G_Score, G_Count, G_Type, G_Rival, G_Union, G_WHPassword, G_WHMoney', 'numerical', 'integerOnly'=>true),
			array('G_Name', 'length', 'max'=>8),
			array('G_Mark', 'length', 'max'=>32),
			array('G_Master', 'length', 'max'=>10),
			array('G_Notice', 'length', 'max'=>60),
			array('G_Warehouse', 'length', 'max'=>3840),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('G_Name, G_Mark, G_Score, G_Master, G_Count, G_Notice, Number, G_Type, G_Rival, G_Union, G_Warehouse, G_WHPassword, G_WHMoney', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
            'members'    => array(self::HAS_MANY,   'GuildMember',  'G_Name')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'G_Name' => 'G Name',
			'G_Mark' => 'G Mark',
			'G_Score' => 'G Score',
			'G_Master' => 'G Master',
			'G_Count' => 'G Count',
			'G_Notice' => 'G Notice',
			'Number' => 'Number',
			'G_Type' => 'G Type',
			'G_Rival' => 'G Rival',
			'G_Union' => 'G Union',
			'G_Warehouse' => 'G Warehouse',
			'G_WHPassword' => 'G Whpassword',
			'G_WHMoney' => 'G Whmoney',
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

		$criteria->compare('G_Name',$this->G_Name,true);
		$criteria->compare('G_Mark',$this->G_Mark,true);
		$criteria->compare('G_Score',$this->G_Score);
		$criteria->compare('G_Master',$this->G_Master,true);
		$criteria->compare('G_Count',$this->G_Count);
		$criteria->compare('G_Notice',$this->G_Notice,true);
		$criteria->compare('Number',$this->Number);
		$criteria->compare('G_Type',$this->G_Type);
		$criteria->compare('G_Rival',$this->G_Rival);
		$criteria->compare('G_Union',$this->G_Union);
		$criteria->compare('G_Warehouse',$this->G_Warehouse,true);
		$criteria->compare('G_WHPassword',$this->G_WHPassword);
		$criteria->compare('G_WHMoney',$this->G_WHMoney);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public static function getAGuilds()
    {
        return self::model()->count('Number >= :number', array(':number'=>1));
    }
}