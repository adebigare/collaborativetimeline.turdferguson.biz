<?php
class users_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 

	public function index() {
		# Setup view
			$this->template->content = View::instance('v_index_index');
			$this->template->title   = "Index";

		# Render Template
			echo $this->template;	
	}

	public function signup() {

		# Setup view
			$this->template->content = View::instance('v_users_signup');
			$this->template->title   = "Sign Up";

		#Render Template
			echo $this->template;

	}

	public function p_signup() {
		# More data we want stored with the user
			$_POST['created']  = Time::now();
			$_POST['modified'] = Time::now();

		# Encrypt the password  
	    $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);            

    # Create an encrypted token via their email address and a random string
	    $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string()); 

		# Insert this user into the database
			$user_id = DB::instance(DB_NAME)->insert('users', $_POST);


		# Setup view
			$this->template->content = View::instance('v_users_signup_success');
			$this->template->title   = "Success";

			$this->template->content->token = $_POST['token'];

		# log in new user
			if($user_id) {
			setcookie('token',$_POST['token'], strtotime('+1 year'), '/');
			}

		# Redirect to Profile page
			Router::redirect('/posts/index');



	} ######## End Signup #############


	public function login() {
		# Setup view
			$this->template->content = View::instance('v_users_login');
			$this->template->title   = "Login";

		# Render template
			echo $this->template;
	}

	public function p_login() {

		$email = $_POST['email'];

    #Use the login method provided by the core framework
    $token = $this->userObj->login($email, $_POST['password'], $_POST['timezone']);

    #go to user appropriate page depending on login status
    $this->userObj->login_redirect($token, $email, '/users/index/');

		// # Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
		//     $_POST = DB::instance(DB_NAME)->sanitize($_POST);

		//     # Hash submitted password so we can compare it against one in the db
		//     $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

	 //    # Build Query
		//     $q = "SELECT token 
		//         FROM users 
		//         WHERE email = '".$_POST['email']."' 
		//         AND password = '".$_POST['password']."'";

		//     $token = DB::instance(DB_NAME)->select_field($q);

		//     # If we didn't find a matching token in the database, it means login failed
		//     if(!$token) {

		//         # Send them back to the login page
		//         Router::redirect("/users/login/");

		//     # But if we did, login succeeded! 
		//     } else {

		//         setcookie("token", $token, strtotime('+1 year'), '/');
		//         Router::redirect("/");

		//     }

	} ###### End Login ##########

	public function logout() {

    # Generate and save a new token for next login
	    $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

    # Create the data array we'll use with the update method
    # In this case, we're only updating one field, so our array only has one entry
	    $data = Array("token" => $new_token);

    # Do the update
	    DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

    # Delete their token cookie by setting it to a date in the past - effectively logging them out
	    setcookie("token", "", strtotime('-1 year'), '/');

    # Send them back to the main index.
	    Router::redirect("/");

	} ###### End Logout ##########

	public function profile($user_name = NULL) {
    
    # Only logged in users are allowed...
	    if(!$this->user) {
            die('Members only. <a href="/users/login">Login</a>');
	    }
	    if ($user_name==NULL ) {
    	$display_name = $this->user->first_name;
	    }
    # Set up the View
	    $this->template->content = View::instance('v_users_profile');
	    $this->template->title   = "Profile";                
    # Pass the data to the View
	    $this->template->content->user_name = $display_name;    
    # Display the view
	    echo $this->template;
	                                
  } ######## End Profile ##########

} # end of the class

?>