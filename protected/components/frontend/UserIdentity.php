<?php

class UserIdentity extends CUserIdentity
{
    private $_id;

    public function authenticate()
    {
        $record  = Account::model()->findByAttributes(array('memb___id'=>$this->username));
        $getChar = AccountCharacter::model()->findByAttributes(array('Id'=>$this->username));

        if($this->getFConfig('md5') == 0)
        {
            if($record===null)
                $this->errorCode=self::ERROR_USERNAME_INVALID;
            else if($record->memb__pwd != $this->password)
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
            else
            {
                $this->_id=$record->memb_guid;
                $this->username = $record->memb___id;
                $this->setState('guid', $record->memb_guid);
                $this->setState('char', $getChar->GameIDC);
                $this->setState('username', $record->memb___id);
                $this->setState('role', $record->status);
                $this->errorCode=self::ERROR_NONE;
            }
        }
        else
        {
            if($record===null)
                $this->errorCode=self::ERROR_USERNAME_INVALID;
            else if($record->memb__pwd != md5($this->password.$this->username))
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
            else
            {
                $this->_id=$record->memb_guid;
                $this->memb___id = $record->memb___id;
                $this->setState('char', $getChar->GameIDC);
                $this->setState('account', $record->memb___id);
                $this->setState('role', $record->status);
                $this->errorCode=self::ERROR_NONE;
            }
        }

        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }
}
