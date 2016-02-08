<?php
/**
 * Base Controller class
 */
class Controller {
    
    protected $template;
    protected $pageTitle;
    
    function __construct() {
        $this->template = new Template();
        // Start a new Session if none existed
        if ( $this->is_session_started() === FALSE ) {
            session_start();
        }

        $this->setVariable('title', substr($this->getPageTitle(),0,-10));
    }
    
    function index(){
        error_log("Controller[".get_called_class()."] index method is not defined");
    }

    public function getPageTitle(){
        // echo get_called_class();
        return get_called_class();
    }
    
    protected function setView($folder,$file){
        $this->template->set($folder,$file);
    }
    protected function setVariable($key,$value){
        $this->template->setVariable($key,$value);
    }

    protected function is_session_started(){
        if ( php_sapi_name() !== 'cli' ) {
            if ( version_compare(phpversion(), '5.4.0', '>=') ) {
                return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
            } else {
                return session_id() === '' ? FALSE : TRUE;
            }
        }
        return FALSE;
    }

    
    function notifyBar($type, $msg){
        switch ($type) {
            case 'success':
                # code...
                $this->setVariable('info' ,'<div class="alert alert-success" role="alert">
                          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                          <span class="sr-only">Success:</span>'. $msg .'</div>');
                break;
            case 'error':
                  # code...
                $this->setVariable('info' ,'<div class="alert alert-error" role="alert">
                          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                          <span class="sr-only">Error:</span>'. $msg .'</div>');
                  break;  

            default:
                # code...
                break;
        }
    }
    
    function __destruct(){
        $this->template->render();
    }


}

?>