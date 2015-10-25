<?php
class ThirdActiveRecord extends CActiveRecord
{
    public function getDbConnection()
    {
        return Yii::app()->db_3;
    }
}