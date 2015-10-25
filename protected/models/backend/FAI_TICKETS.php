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

    public $actions;
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
			array('date', 'numerical', 'integerOnly'=>true),
			array('memb___id, character', 'length', 'max'=>20),
			array('topic', 'length', 'max'=>50),
            array('memb___id,character,topic,description,ip','filter',
                'filter'=>array($obj=new CHtmlPurifier(),'purify')),
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
			'topic' => 'topic',
			'description' => 'Description',
			'date' => 'Date',
			'ip' => 'Ip',
            'status'=>'Status',
            'priority'=>'Priority'
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('memb___id',$this->memb___id,true);
		$criteria->compare('character',$this->character,true);
		$criteria->compare('topic',$this->topic,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('date',$this->date);
		$criteria->compare('ip',$this->ip,true);
        $criteria->compare('status',$this->status,true);
        $criteria->compare('priority',$this->priority,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>25,
                'pageVar'=>'page',
            ),
            'sort'=>array(
                'defaultOrder'=>'id ASC',
            ),
		));
	}

    public function getStatus($params, $type)
    {
        if($type == 'word')
        {
            switch($params)
            {
                case 0 : $entity = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Opened');   break;
                case 1 : $entity = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Closed');   break;
            }
        }
        elseif($type == 'css')
        {
            switch($params)
            {
                case 0 : $entity = 'opened';   break;
                case 1 : $entity = 'closed';   break;
            }
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