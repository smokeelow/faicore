<?php
class MailForm extends CFormModel
{
    public $topic;
    public $message;

    public function rules()
    {
        return array(
            array('topic, message', 'required'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'topic'     => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Topic'),
            'message'   => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Text')
        );
    }
}