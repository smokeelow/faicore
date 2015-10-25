<?php

/**
 * This is the model class for table "MEMB_CREDITS".
 *
 * The followings are the available columns in table 'MEMB_CREDITS':
 * @property string $memb___id
 * @property integer $credits
 * @property integer $used
 */
class MEMBCREDITS extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MEMBCREDITS the static model class
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
		return 'MEMB_CREDITS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('memb___id', 'required'),
			array('credits', 'numerical', 'integerOnly'=>true),
			array('memb___id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('memb___id, credits, used', 'safe', 'on'=>'search'),
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
			'memb___id' => 'Memb',
			'credits' => 'Credits',
			'used' => 'Used',
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

		$criteria->compare('memb___id',$this->memb___id,true);
		$criteria->compare('credits',$this->credits);
		$criteria->compare('used',$this->used);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public static function getCCredits()
    {
        $entity = self::model()->find(array(
            'select'=>'credits',
            'condition'=>'memb___id=:memb___id',
            'params'=>array(':memb___id'=>Yii::app()->user->username)
        ));

        if($entity['credits'] != 0)
        {
            return $entity['credits'];
        }
        else
        {
            return 0;
        }

    }
}