<?php

class index_controller extends base_controller {
	
	public function __construct() {
		parent::__construct();
	} 
		
	/*-------------------------------------------------------------------------------------------------
	Accessed via http://localhost/index/index/
	-------------------------------------------------------------------------------------------------*/
	public function index() {

			if ($this->user) {
				Router::redirect('/users/index');
			}

			$this->template->title = "Collaborative Timeline";
			$this->template->content = View::instance('v_index_index');
			$this->template->content->signup = View::instance('v_users_signup');
	      					     		
		# Render the view
			echo $this->template;

	} # End of method
	
	
} # End of class
