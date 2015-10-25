<?php
class Files extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'FAI_FILES';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, link', 'required'),
            array('link', 'url'),
            array('description', 'length', 'max'=>32)
        );
    }


    public function attributeLabels()
    {
        return array(
            'id'            => 'ID',
            'title'         => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Title'),
            'description'   => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Description'),
            'link'          => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Link'),
        );
    }


}