<?php
	class users_controller extends base_controller {

		public function __construct() {
			parent::__construct();
		} 

	////////////////////// USERS HOME ////////////////////////////////

		public function index() {

			# Setup view
				$this->template->profile_widget = View::instance('v_users_profile_widget');
				$this->template->content = View::instance('v_posts_index');
				$this->template->add_post = View::instance('v_posts_add');
				$this->template->title   = "Index";

			# Set User's Table information
				$this->template->profile_widget->user_info = $this->user;

			# Create User's feed
				$user_feed = Post_feed::user_feed($this->user);
				$this->template->content->posts = $user_feed;

			# Render Template
				echo $this->template;	
		}


	////////////////////// SIGN UP ////////////////////////////////

		public function signup() {

			# Setup view
				$this->template->content = View::instance('v_users_signup');
				$this->template->title   = "Sign Up";

			# Render Template
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
				Router::redirect('/users/profile');

		} 



	////////////////////// LOGIN ////////////////////////////////


		public function login($error=NULL) {
			# Setup view
				$this->template->content = View::instance('v_users_login');
				$this->template->title   = "Login";

			# Send error var to view if user login fails
				$this->template->content->error = $error;

			# Render template
				echo $this->template;
		}

		public function p_login() {

			# Get users email
				$email = $_POST['email'];

			#Use the login method provided by the core framework
				$token = $this->userObj->login($email, $_POST['password'], $_POST['timezone']);

			# If the login fails
				if(!$token) { 
					Router::redirect("/users/login/error"); 

				} else { # otherwise go to user home

					setcookie("token", $token, strtotime('+2 weeks'), '/');
					Router::redirect("/users/index");
				}

		} 



	////////////////////// LOGOUT ////////////////////////////////

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

		} 



	////////////////////// PROFILE ////////////////////////////////

		public function profile($user_name = NULL) {
			
			# Only logged in users are allowed...
				if(!$this->user) {
							die('Members only. <a href="/users/login">Login</a>');
				}
			
			# Set up the View
				$profile_view = View::instance('v_users_profile');
				$this->template->profile = $profile_view;

				$profile_view->user_info = $this->user;

				$this->template->title   = "Profile";     

			# Display the view
				echo $this->template;
																		
		}


	////////////////////// UPLOAD PROFILE IMAGE //////////////////

		public function upload_profile_image($error=NULL) {

			$this->template->title = "Upload Image";
			$this->template->content = View::instance('v_users_upload_profile_image');

			$this->template->content->error = $error;

			echo $this->template;
		}


		public function p_upload_profile_image() {

				$user_id = $this->user->user_id;

		    $file_path = APP_PATH.AVATAR_PATH.$user_id; 
		    
		    $file_name = $file_path.".png"; 

		    if (move_uploaded_file ($_FILES['upload_image_file'] ['tmp_name'], $file_name)) {
	    		
	    		# Update the database
	    		DB::instance(DB_NAME)->update('users', Array("avatar" => $imgObj), "WHERE user_id = ".$user_id);

	    		Router::redirect('/users/profile');

		  	} else {

		  		Router::redirect('users/profile/error');
			   
				}   
		}


	/////////////// USER TO USER RELATIONSHIPS //////////////////

			public function relationships() {

				# Setup view
					$this->template->content = View::instance("v_users_relationships");
					$this->template->title = "User Relationships";

				# Build Query for users
					$q = "SELECT *
								FROM users";

					$users = DB::instance(DB_NAME)->select_rows($q);

				# Build Query connections
					$q = "SELECT *
								FROM users_users
								WHERE user_id = ".$this->user->user_id;

					$connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');

				# Set view variables
					$this->template->content->users = $users;
					$this->template->content->connections = $connections;

					echo $this->template;
			}

			public function follow($user_id_followed) {

				# Prepare the data array to be inserted
					$data = Array(
				    "created" => Time::now(),
				    "user_id" => $this->user->user_id,
				    "user_id_followed" => $user_id_followed
			    );

				# Do the insert
					DB::instance(DB_NAME)->insert('users_users', $data);

				# Send them back
					Router::redirect("/posts/relationships");

			}

			public function unfollow($user_id_followed) {

		    # Delete this connection
			    $where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
			    DB::instance(DB_NAME)->delete('users_users', $where_condition);

		    # Send them back
			    Router::redirect("/posts/relationships");

			}

			////////////// End User <-> User ///////////////////////////


	} # end of the class

?>