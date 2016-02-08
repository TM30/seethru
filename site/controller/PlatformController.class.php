<?php
/**
 * LogTail  Controller
 */

class PlatformController extends Controller {
	
	function __construct() {
		$this->template = new Template();
        $this->setVariable('title', substr(get_class(),0,-10));
	}
    
    function index(){

        // $this->setVariable('smscs', $smscs);        
        $this->setView('', 'platform');
    }

   
   
}

?>