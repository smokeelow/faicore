<?php

/**
 * This is the model class for table "FAI_ru_CP_HOME".
 *
 * The followings are the available columns in table 'FAI_ru_CP_HOME':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $date
 * @property string $author
 * @property integer $status
 */
class FAI_CPHOME extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FAI_CPHOME the static model class
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
		return 'FAI_'.Yii::app()->request->cookies['language']->value.'_CP_HOME';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
            array('title, description,s_desc, status', 'required'),
			array('date, status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>50),
			array('description, s_desc', 'length', 'max'=>1073741823),
			array('author', 'length', 'max'=>20),
            array('img', 'url'),
			array('id, title, description, date, author, status', 'safe', 'on'=>'search'),
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
			'title' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Title'),
            'description'    => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Text of full news'),
			'date' => 'Date',
			'author' => 'Author',
			'status' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Status'),
            's_desc'    => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Text of short news'),
            'img'       => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Image of news'),
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('date',$this->date);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('status',$this->status);

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
}