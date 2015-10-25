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
			array('title, s_desc, f_desc, img, active, url, meta_desc, meta_key', 'required'),
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

	public function attributeLabels()
	{
		return array(
			'id'        => 'ID',
			'title'     => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Title'),
            'meta_desc' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Meta description'),
            'meta_key'  => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Meta keywords'),
            'url'       => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'URL'),
			's_desc'    => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Text of short news'),
			'f_desc'    => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Text of full news'),
			'p_date'    => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Date'),
			'img'       => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Image of news'),
            'active'    => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Status'),
		);
	}

    public static function getTranslit($str)
    {
        $translit = array(
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D',     'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh', 'З' => 'Z',
            'И' => 'I', 'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M',     'Н' => 'N', 'О' => 'O',  'П' => 'P',  'Р' => 'R',
            'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H',     'Ц' => 'Ts','Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch',
            'Ъ' => '',  'Ы' => 'U', 'Ь' => '',  'Э' => 'E', 'Ю' => 'Yu',    'Я' => 'Ya',
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',     'е' => 'e',  'ё' => 'yo', 'ж' => 'zh', 'з' => 'z',
            'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm',     'н' => 'n',  'о' => 'o',  'п' => 'p',  'р' => 'r',
            'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h',     'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
            'ъ' => '', 'ы'  => 'y', 'ь' => '',  'э' => 'e', 'ю' => 'yu',    'я' => 'ya',
            ' ' => '-', '!' => '', '?'  => '',   '('=> '',  ')' => '',      '#' => '',  ',' => '', '№' =>  '',' - '=>'-',   '/'=>'-', '   '=>'-',
            'A' => 'a', 'B' => 'b', 'C' => 'c', 'D' => 'd', 'E' => 'e',     'F' => 'f', 'G' => 'g', 'H' => 'h', 'I' => 'i', 'J' => 'j', 'K' => 'k', 'L' => 'l', 'M' => 'm', 'N' => 'n',
            'O' => 'o', 'P' => 'p', 'Q' => 'q', 'R' => 'r', 'S' => 's',     'T' => 't', 'U' => 'u', 'V' => 'v', 'W' => 'w', 'X' => 'x', 'Y' => 'y', 'Z' => 'z'
        );

        return strtr($str, $translit);
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
            ' '.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'in').' ',
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

    public static function strCut($txt)
    {
        if(strlen($txt) > 70)
        {
            echo substr($txt, 0, 80)."...";
        }
        else
        {
            echo substr($txt, 0, 80);
        }
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