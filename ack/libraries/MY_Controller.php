<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Code here is run before ALL controllers
class MY_Controller extends Controller
{
	var $module;
	var $controller;
	var $method;
	
	function __construct()
	{
		parent::Controller();
		
		$this->benchmark->mark('my_controller_start');

		$this->hooks =& $GLOBALS['EXT'];

		// Hook point
		$this->hooks->_call_hook('post_core_controller_constructor');	
        
        // Work out module, controller and method and make them accessible throught the CI instance
        //$this->module 				= $this->router->fetch_module();
        $this->controller			= $this->router->fetch_class();
        $this->method 				= $this->router->fetch_method();
        
        //$this->data->module 		=& $this->module;
        $this->data->controller 	=& $this->controller;
        $this->data->method 		=& $this->method;

        // $_POST = $this->input->xss_clean($_POST);

		// Simple ACK variables
        $ack['base_url']			= BASE_URL;
        $ack['base_uri'] 			= BASE_URI;
        $ack['application_uri'] 	= APPPATH_URI;

		// Mega ACK arrays
        $ack['server'] = (array) $_SERVER;
        
        $this->load->vars('ack', $ack); 
        
        $this->benchmark->mark('my_controller_end');
	}
}