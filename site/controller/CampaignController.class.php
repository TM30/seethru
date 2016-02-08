<?php

/**
 * Site Index Controller
 */

class CampaignController extends Controller {
	
	function __construct(){
        parent::__construct();
    }
    
    function index(){

        $this->setView('', 'campaign');

        if (isset($_GET['addToBaseBtn'])) {
        	# code...
        	
        }


        // From Base
        if(isset($_GET['target_size'])){

        	$size = $_GET['target_size'];
        	$last_campaign = $_GET['last_campaign'];

        	Susbcriber::get();

        }

        // From Sample INput
        if(isset($_GET['sample_msisdn'])){



        }

        // From File
        if(isset($_GET['instant_file'])){

        }
        

        

    }
   
}

?>