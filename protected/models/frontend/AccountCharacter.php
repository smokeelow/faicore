<?php

/**
 * This is the model class for table "AccountCharacter".
 *
 * The followings are the available columns in table 'AccountCharacter':
 * @property integer $Number
 * @property string $Id
 * @property string $GameID1
 * @property string $GameID2
 * @property string $GameID3
 * @property string $GameID4
 * @property string $GameID5
 * @property string $GameIDC
 * @property integer $MoveCnt
 * @property integer $Summoner
 * @property integer $WarehouseExpansion
 * @property integer $RageFighter
 * @property integer $SecCode
 */
class AccountCharacter extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AccountCharacter the static model class
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
		return 'AccountCharacter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Id', 'required'),
			array('MoveCnt, Summoner, WarehouseExpansion, RageFighter, SecCode', 'numerical', 'integerOnly'=>true),
			array('Id, GameID1, GameID2, GameID3, GameID4, GameID5, GameIDC', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Number, Id, GameID1, GameID2, GameID3, GameID4, GameID5, GameIDC, MoveCnt, Summoner, WarehouseExpansion, RageFighter, SecCode', 'safe', 'on'=>'search'),
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
            'getInfo' => array(self::HAS_ONE,   'Character',  'Name')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Number' => 'Number',
			'Id' => 'ID',
			'GameID1' => 'Game Id1',
			'GameID2' => 'Game Id2',
			'GameID3' => 'Game Id3',
			'GameID4' => 'Game Id4',
			'GameID5' => 'Game Id5',
			'GameIDC' => 'Game Idc',
			'MoveCnt' => 'Move Cnt',
			'Summoner' => 'Summoner',
			'WarehouseExpansion' => 'Warehouse Expansion',
			'RageFighter' => 'Rage Fighter',
			'SecCode' => 'Sec Code',
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

		$criteria->compare('Number',$this->Number);
		$criteria->compare('Id',$this->Id,true);
		$criteria->compare('GameID1',$this->GameID1,true);
		$criteria->compare('GameID2',$this->GameID2,true);
		$criteria->compare('GameID3',$this->GameID3,true);
		$criteria->compare('GameID4',$this->GameID4,true);
		$criteria->compare('GameID5',$this->GameID5,true);
		$criteria->compare('GameIDC',$this->GameIDC,true);
		$criteria->compare('MoveCnt',$this->MoveCnt);
		$criteria->compare('Summoner',$this->Summoner);
		$criteria->compare('WarehouseExpansion',$this->WarehouseExpansion);
		$criteria->compare('RageFighter',$this->RageFighter);
		$criteria->compare('SecCode',$this->SecCode);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public static function getCChar()
    {
        $char = self::model()->find(array(
            'select'=>'GameIDC',
            'condition'=>'Id=:Id',
            'params'=>array(':Id'=>Yii::app()->user->username)
        ));

        return $char['GameIDC'];
    }
}