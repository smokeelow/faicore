<?php
class FirstActiveRecord extends CActiveRecord
{
    public function getDbConnection() {
        return Yii::app()->db_1;
    }
}