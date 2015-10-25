<?php
class FourthActiveRecord extends CActiveRecord
{
    public function getDbConnection()
    {
        return Yii::app()->db_4;
    }
}