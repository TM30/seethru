<?php
/**
 * Site Index Controller
 */
class UserController extends Controller {
	
	function __construct() {

		parent::__construct();

        $this->setVariable('title', substr(get_class(),0,-10));
	}
    
    function index(){
        
        // Show List of Profiles1
        $this->view();

    }

    public function add(){
    	# code...
    	
    	if(isset($_POST['addUserBtn']) || isset($_POST['editUserBtn'])) {

    		$user = new Profile();
    		$user->setUsername(Utils::sanitize($_POST['username']));
    		$user->setPassword(Utils::sanitize($_POST['password']));
            $user->setShortcode(Utils::sanitize($_POST['shortcode']));
            $user->setSMSC(Utils::sanitize($_POST['smsc']));
            $user->setType('send_profile');
    		// $user->save();
            
            isset($_POST['editUserBtn']) ? $user->update() : $user->save();
            $msg = isset($_POST['editUserBtn']) ? 'Profile Successfully Updated' : 'New Profile Added';
            $this->notifyBar('success', $msg);

            $u = Profile::getAll();
            $this->setVariable('users', $u);
            $this->setView('', 'list-user');

    	}
        else
        $this->setView('', 'add-new-user');
    }

    public function view()
    {
    	# code...
    	$u = Profile::getAll(array('type' => 'send_profile'));
    	// print_r($u);
    	$this->setVariable('users', $u);
    	$this->setView('', 'list-user');
    }

    function delete($value){
        $u = Profile::getOne(array('name' => $value));
        $u->delete();
        $this->view();
    }

    function edit($value){

        $user = Profile::getOne(array('name' => $value));

        if (!isset($value)) {
            # code...
            $this->notifyBar('error','No profile Selected, Create New');
        } 
        else{
        	if ($user->getType() == 'administrator'){
        
        		$this->setVariable('role', 'admin');
        		
        	}
            $this->setVariable('profile', $user);
        }

        $this->setView('', 'add-new-user');

    }
   
}

?>