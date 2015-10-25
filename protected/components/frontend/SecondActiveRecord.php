<?php
class SecondActiveRecord extends CActiveRecord
{
    public function getDbConnection() {
        return Yii::app()->db_2;
    }
}