<?php

/**
 * This is the model class for table "FAI_MMOTOP".
 *
 * The followings are the available columns in table 'FAI_MMOTOP':
 * @property integer $id
 * @property integer $vote_id
 * @property integer $vote_date
 * @property string $vote_ip
 * @property string $vote_acc
 * @property integer $vote_type
 */
class FAIMMOTOP extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FAIMMOTOP the static model class
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
		return 'FAI_MMOTOP';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vote_id, vote_date, vote_type', 'numerical', 'integerOnly'=>true),
			array('vote_ip', 'length', 'max'=>15),
			array('vote_acc', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, vote_id, vote_date, vote_ip, vote_acc, vote_type', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'vote_id' => 'Vote',
			'vote_date' => 'Vote Date',
			'vote_ip' => 'Vote Ip',
			'vote_acc' => 'Vote Acc',
			'vote_type' => 'Vote Type',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('vote_id',$this->vote_id);
		$criteria->compare('vote_date',$this->vote_date);
		$criteria->compare('vote_ip',$this->vote_ip,true);
		$criteria->compare('vote_acc',$this->vote_acc,true);
		$criteria->compare('vote_type',$this->vote_type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}