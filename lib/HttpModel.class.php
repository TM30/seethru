<?php
/**
 * Model base class
 */
class HttpModel {
    
    protected static $objectName = '';
    protected static $primaryKey = '';
    protected $columns;
    
	function __construct() {
		$this->columns = array();
	}
    
    function setColumnValue($column,$value){
        $this->columns[$column] = $value;
    }
    
    function getColumnValue($column){
        return $this->columns[$column];
    }

    /**
     * Save or update the item data in database
     */
    function save(){
        $class = get_called_class();
        $path = static::$objectName;
        $url = BASE_URL . $path;
        Utils::httpPost($url, json_encode($this->columns));
    }

    /**
     * Save or update the item data in database
     */
    function update(){

        $class = get_called_class();
        $path = static::$objectName . "/" . self::$primarykey;
        $url = BASE_URL . $path;
        Utils::httpUpdate($url, json_encode($this->columns));
        
    }
    
    /**
     * Delete this item data from database
     */
    function delete(){
      
        $class = get_called_class();
        echo static::$objectName;
        $path = self::$objectName . "/" . self::$primarykey;
        $url = BASE_URL . $path;
        Utils::httpDelete($url);
    }
    
    /**
     * Create an instance of this Model from the API returned row
     */
    function createFromAPI($column){
        foreach ($column as $key => $value) {
            $this->columns[$key] = $value;
        }
    }
    
    /**
     * Get all items
     * Conditions are combined by logical AND
     * @example getAll(array(name=>'Bond',job=>'artist'),'age DESC',0,25) converts to SELECT * FROM TABLE WHERE name='Bond' AND job='artist' ORDER BY age DESC LIMIT 0,25
     */
    static function getAll(){

        $class = get_called_class();

        $collection = array();
        $path = static::$objectName . "s";
        $url = BASE_URL . $path;
        // echo $url;
        $response = Utils::httpGet($url);
        // print_r($response);
        foreach ($response as $row) {
            # code...
            $item = new $class();
            $item->createFromAPI($row);
            array_push($collection,$item);
        }

        return $collection;
    }

    /**
     * Get a single item
     */
    static function getOne($primarykey){
      
        $class = get_called_class();

        $path = static::$objectName . "/" . $primarykey;
        $url = BASE_URL . $path;
        $item = new $class();
        
        return $item->createFromAPI(Utils::httpGet($url));

    }
    
    /**
     * Get the number of items
     */
    static function getCount($condition=array()){
        return count(self::getAll());
    }
    
}