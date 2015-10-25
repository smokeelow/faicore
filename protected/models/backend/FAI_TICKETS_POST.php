<?php

/**
 * This is the model class for table "FAI_TICKETS_POST".
 *
 * The followings are the available columns in table 'FAI_TICKETS_POST':
 * @property integer $id
 * @property integer $ticket_id
 * @property string $message
 * @property integer $date
 * @property string $name
 * @property string $ip
 * @property string $photo
 */
class FAI_TICKETS_POST extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FAITICKETSPOST the static model class
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
		return 'FAI_TICKETS_POST';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('message', 'required'),
			array('ticket_id, date', 'numerical', 'integerOnly'=>true),
			array('message', 'length', 'max'=>1073741823),
			array('name', 'length', 'max'=>20),
            array('message,name,photo,ip','filter',
                'filter'=>array($obj=new CHtmlPurifier(),'purify')),
			array('ip', 'length', 'max'=>15),
			array('photo', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ticket_id, message, date, name, ip, photo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
    public function relations()
    {
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
			'ticket_id' => 'Ticket',
			'message' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Message'),
			'date' => 'Date',
			'name' => 'Name',
			'ip' => 'Ip',
			'photo' => 'Photo',
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
		$criteria->compare('ticket_id',$this->ticket_id);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('date',$this->date);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('photo',$this->photo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}