<?php

/**
 * This is the model class for table "MuCastle_REG_SIEGE".
 *
 * The followings are the available columns in table 'MuCastle_REG_SIEGE':
 * @property integer $MAP_SVR_GROUP
 * @property string $REG_SIEGE_GUILD
 * @property integer $REG_MARKS
 * @property integer $IS_GIVEUP
 * @property integer $SEQ_NUM
 */
class MuCastleREGSIEGE extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MuCastleREGSIEGE the static model class
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
		return 'MuCastle_REG_SIEGE';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MAP_SVR_GROUP, REG_SIEGE_GUILD, REG_MARKS, IS_GIVEUP, SEQ_NUM', 'required'),
			array('MAP_SVR_GROUP, REG_MARKS, IS_GIVEUP, SEQ_NUM', 'numerical', 'integerOnly'=>true),
			array('REG_SIEGE_GUILD', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('MAP_SVR_GROUP, REG_SIEGE_GUILD, REG_MARKS, IS_GIVEUP, SEQ_NUM', 'safe', 'on'=>'search'),
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
			'REG_SIEGE_GUILD' => 'Reg Siege Guild',
			'REG_MARKS' => 'Reg Marks',
			'IS_GIVEUP' => 'Is Giveup',
			'SEQ_NUM' => 'Seq Num',
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
		$criteria->compare('REG_SIEGE_GUILD',$this->REG_SIEGE_GUILD,true);
		$criteria->compare('REG_MARKS',$this->REG_MARKS);
		$criteria->compare('IS_GIVEUP',$this->IS_GIVEUP);
		$criteria->compare('SEQ_NUM',$this->SEQ_NUM);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}