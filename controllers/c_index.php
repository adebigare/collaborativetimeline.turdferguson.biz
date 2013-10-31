<?php

class index_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();
	} 
		
	/*-------------------------------------------------------------------------------------------------
	Accessed via http://localhost/index/index/
	-------------------------------------------------------------------------------------------------*/
	public function index() {

		# Redirect Logged in users to their feed
			if ($this->user) {
				header('Location: posts');
				die();
			} 

		# Set View for Unlogged User
			$this->template->content = View::instance('v_index_index');
			$this->template->content->signup = View::instance('v_users_signup');
			$this->template->title = "Collaborative Timeline";

	      					     		
		# Render the view
			echo $this->template;

	} # End of method
	
	
} # End of class
