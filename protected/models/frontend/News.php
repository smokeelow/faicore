<?php

class News extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'FAI_'.Yii::app()->request->cookies['language']->value.'_NEWS';
	}

	public function rules()
	{
		return array(
			array('title, s_desc, f_desc, img, active, url', 'required'),
			array('title, img', 'length', 'max'=>255),
			array('date', 'length', 'max'=>50),
			array('id, title, s_desc, f_desc, p_date, img', 'safe', 'on'=>'search'),
            array('img', 'url'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

    public static function getDate($date)
    {
        $search  = array(
            '-.',
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec',
        );

        $replace = array(
            ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', ' in ').' ',
            ' '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'January').' ',
            ' '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'February').' ',
            ' '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'March').' ',
            ' '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'April').' ',
            ' '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'May').' ',
            ' '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'June').' ',
            ' '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'July').' ',
            ' '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'August').' ',
            ' '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'September').' ',
            ' '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'October').' ',
            ' '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'November').' ',
            ' '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'December').' ',
        );
        return str_replace($search,$replace,$date);
    }

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('s_desc',$this->s_desc,true);
		$criteria->compare('f_desc',$this->f_desc,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('img',$this->img,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}