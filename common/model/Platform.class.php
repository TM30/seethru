<?php
/**
 * Campaigns Model
 */
class Platform extends HttpModel {
	
    protected static $objectName = 'platform';
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

    function setHostName($value){
        $this->setColumnValue('host_name', $value);
    }
    function getHostName(){
        return $this->getColumnValue('host_name');
    }

    function setIp($value){
        $this->setColumnValue('ip_address', $value);
    }
    function getIp(){
        return $this->getColumnValue('ip_address');
    }

}
