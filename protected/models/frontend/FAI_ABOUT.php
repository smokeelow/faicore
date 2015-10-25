<?php

/**
 * This is the model class for table "FAI_ru_ABOUT".
 *
 * The followings are the available columns in table 'FAI_ru_ABOUT':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $date
 * @property integer $status
 * @property integer $onmpage
 */
class FAI_ABOUT extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FAI_ABOUT the static model class
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
		return 'FAI_'.Yii::app()->request->cookies['language']->value.'_ABOUT';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
            array('title, description, status, meta_key, meta_desc, onmpage', 'required'),
			array('date, status, onmpage', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>50),
			array('description', 'length', 'max'=>1073741823),

			array('id, title, description, date, status, onmpage', 'safe', 'on'=>'search'),
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
			'id'            => 'ID',
			'title'         => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Title'),
			'description'   => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Description'),
            'meta_desc'     => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Meta description'),
            'meta_key'      => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Meta keywords'),
			'date'          => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Date'),
			'status'        => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Status'),
			'onmpage'       => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Show on "About Us"'),
		);
	}
}