<?php
/**
 * User Model
 */
class Profile extends Model {
	
    protected static $tableName = 'Users';
    protected static $primaryKey = 'id';
    
    
    function setId($value){
        $this->setColumnValue('id', $value);
    }
    function getId(){
        return $this->getColumnValue('id');
    }
    
    function setUsername($value){
        $this->setColumnValue('name', $value);
    }
    function getUsername(){
        return $this->getColumnValue('name');
    }

    function setShortcode($value){
        $this->setColumnValue('shortcode', $value);
    }

    function getShortcode(){
        return $this->getColumnValue('shortcode');
    }

    function setPassword($value){
        $this->setColumnValue('password', $value);
    }
    function getPassword(){
        return $this->getColumnValue('password');
    }
}
