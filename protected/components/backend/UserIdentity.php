<?php

class UserIdentity extends CUserIdentity
{
    private $_id;
    public $salt = "8xR%9_@03g4@%!_$:%)&sER*W+WQeWk:As*dL.?)-:LRW{p;>?@ZD*k#+%@";

    public function authenticate()
    {
        $record = Entrance::model()->findByAttributes(array('name'=>$this->username));
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->password != md5($this->password.$this->salt))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$record->id;
            $this->username = $record->name;
            $this->setState('username', $record->name);
            $this->setState('role', $record->status);
            $this->setState('picture', $record->photo);
            $this->setState('rname',$record->rname);
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }
}
