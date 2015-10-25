<?php
class WebUser extends CWebUser {
    private $_model = null;

    function getRole() {
        if($record = $this->getModel()){
            return $record->status;
        }
    }

    private function getModel(){
        if (!$this->isGuest && $this->_model === null){
            $this->_model = Account::model()->findByAttributes($this->memb___id, array('select' => 'status'));
        }
        return $this->_model;
    }
}