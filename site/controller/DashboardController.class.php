<?php
/**
 * Site Index Controller
 */
class DashboardController extends Controller {
    
    function __construct() {

        parent::__construct();
        $this->setVariable('title', substr(get_class(),0,-10));
    
    }
    
    function index(){

        $p = Platform::getAll();

        // print_r($p);
        $status = array();

        foreach ($p as $key => $platform) {
            # code...
            $data['platform_name'] = $platform->getName();
            $data['platform_ip'] = $platform->getIp();
            $data['platform_host'] = $platform->getHostName();
            // $data['status'] = json_decode(file_get_contents('http://50.28.37.181:8090/demo/seethru/api/status/'. $platform->getName() .'/sms_c'),true);
            $status = json_decode(file_get_contents('http://localhost/seethru/api/status'),true);

            // print_r($status);

            $gw_uptime = explode(' ', $status['gateway_uptime']);
            $data['gateway_uptime'] = $gw_uptime;


            $status[] = $data;
        }    

        $this->setVariable('platforms', $status);       

        $this->setView('', 'dashboard');
 
    }
   
}

?>