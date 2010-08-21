<?php

class Welcome extends My_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
		$this->load->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./ack/controllers/welcome.php */