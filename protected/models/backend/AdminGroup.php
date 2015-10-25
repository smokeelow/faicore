<?php
class AdminGroup extends CActiveRecord
{
    public $newPass;

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'FAI_ADM_GROUP';
    }

    public function rules()
    {
        return array(
            array('name,status,access,password', 'required'),
            array('photo', 'url'),
            array('name,password,newPass', 'checkType'),
            array('name,status,access,password,rname,photo','filter',
                'filter'=>array($obj=new CHtmlPurifier(),'purify')),
            array('rname', 'length', 'max'=>20)
        );
    }

    public function attributeLabels()
    {
        return array(
            'id'        => 'ID',
            'name'      => ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Account').'',
            'password'  => ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Password').'',
            'newPass'   => ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'New password').'',
            'access'    => ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Access').'',
            'status'    => ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Status').'',
            'photo'     => ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Avatar').'',
            'rname'     => ''.Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Real name').''
        );
    }

    public function search()
    {
        $criteria=new CDbCriteria;

        $criteria->compare('name',$this->name,true);
        $criteria->compare('status',$this->status,true);
        $criteria->compare('access',$this->access,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=> 100,
                'pageVar'=>'page',
            ),
            'sort'=>array(
                'defaultOrder'=>'status DESC',
            ),
        ));
    }

    public function checkType($attribute)
    {
        if($this->$attribute !='' && !preg_match ('/^[a-z0-9]+$/is',$this->$attribute))
        {
            $this->addError($attribute, Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Allowed only latin characters and numbers'));
        }
    }

    public static function getRoles($type,$role='')
    {
        if($type == 'table' && $role != '')
        {
            $roles = array(
                'journalist'            =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Journalist'),
                'moderator'             =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Moderator'),
                'administrator'         =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Administrator'),
                'super-administrator'   =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Super administrator'),
            );

            return $roles[$role];
        }
        elseif($type == 'list')
        {
            $roleArray = array(
                'journalist'            =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Journalist'),
                'moderator'             =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Moderator'),
                'administrator'         =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Administrator'),
                'super-administrator'   =>  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Super administrator'),
            );

            foreach($roleArray as $key => $role)
            {
                $roles[$key] = $role;
            }

            return $roles;
        }
    }

    public static function getAccess()
    {
        $accessArray = array(
            '1' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Available'),
            '0' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Not available')
        );

        foreach($accessArray as $key => $item)
        {
            $access[$key] = $item;
        }

        return $access;
    }

    public function getConvAccess($id)
    {
        $accessArray = array(
            '0' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Not available'),
            '1' => Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Available')
        );

        return $accessArray[$id];
    }
}