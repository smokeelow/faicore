<?php
class IpbActiveRecord extends CActiveRecord
{
    public function getDbConnection() {
        return Yii::app()->ipb;
    }
}