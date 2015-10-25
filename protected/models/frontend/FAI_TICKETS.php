<?php

/**
 * This is the model class for table "FAI_TICKETS".
 *
 * The followings are the available columns in table 'FAI_TICKETS':
 * @property integer $id
 * @property string $memb___id
 * @property string $character
 * @property string $topic
 * @property string $description
 * @property integer $date
 * @property string $ip
 */
class FAI_TICKETS extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FAI_TICKETS the static model class
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
		return 'FAI_TICKETS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('topic, description, priority', 'required'),
			array('date, status, priority', 'numerical', 'integerOnly'=>true),
			array('memb___id, character', 'length', 'max'=>20),
			array('topic', 'length', 'max'=>50),
			array('description', 'length', 'max'=>1073741823),
			array('ip', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, memb___id, character, topic, description, date, ip', 'safe', 'on'=>'search'),
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
            'getMessage'    => array(self::HAS_MANY, 'FAI_TICKETS_POST',  'ticket_id'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'memb___id' => 'Memb',
			'character' => 'Character',
			'topic' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Topic'),
			'description' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Description'),
			'date' => 'Date',
			'ip' => 'Ip',
            'priority'=> Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Priority'),
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
		$criteria->compare('memb___id',$this->memb___id,true);
		$criteria->compare('character',$this->character,true);
		$criteria->compare('topic',$this->topic,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('date',$this->date);
		$criteria->compare('ip',$this->ip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public static function getTicketStatus($params)
    {
        switch($params)
        {
            case 0 : $entity = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Opened');   break;
            case 1 : $entity = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Closed');   break;
        }

        return $entity;
    }

    public function getPriority($params,$type)
    {
        if($type == 'word')
        {
            switch($params)
            {
                case 0 : $entity = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Low');      break;
                case 1 : $entity = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Normal');   break;
                case 2 : $entity = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'High');     break;
                case 3 : $entity = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Urgent');   break;
            }
        }
        elseif($type == 'css')
        {
            switch($params)
            {
                case 0 : $entity = 'low';      break;
                case 1 : $entity = 'normal';   break;
                case 2 : $entity = 'high';     break;
                case 3 : $entity = 'urgent';   break;
            }
        }

        return $entity;
    }
}