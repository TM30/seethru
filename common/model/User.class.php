<?php
/**
 * Campaigns Model
 */
class User extends HttpModel {
	
    protected static $objectName = 'user';
    protected static $primaryKey = 'id';

    function getId(){
        return $this->getColumnValue('id');
    }
    
    function setName($value){
        $this->setColumnValue('name', $value);
    }
    function getName(){
        return $this->getColumnValue('name');
    }

    function setEmail($value){
        $this->setColumnValue('email', $value);
    }
    function getEmail(){
        return $this->getColumnValue('email');
    }

    function setRole($value){
        $this->setColumnValue('role', $value);
    }
    function getRole(){
        return $this->getColumnValue('role');
    }

}
