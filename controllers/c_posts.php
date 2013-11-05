<?php

	class posts_controller extends base_controller {

		public function __construct() {
			parent::__construct();
		
		# Send the user back to the login page if they're not logged in
			if(!$this->user){
				Router::redirect('/users/login');
				alert("Oops, you've found a members only area, and you're not logged in.");
			}
		}

		public function index($posts = NULL) {

		# View
			$this->template->content = View::instance('v_posts_index');
			$this->template->title = 'Posts';

		# Query
			$this->template->content->posts = Post_feed::user_feed($this->user);

			echo $this->template;

		}


		public function add() {
			# Setup view
				$this->template->content = View::instance('v_posts_add');
				$this->template->title = "New Post";

			# Render template
				echo $this->template;
		}

		public function p_add() {

			# Append relevant data to post content before sending to DB
				$_POST['user_id'] = $this->user->user_id;

				$_POST['created'] = Time::now();
				$_POST['modified'] = Time::now();
				
			# Pulls the title from the entered hyperlink and adds it to the table
				$_POST['content_title'] = Post_feed::get_remote_page_title($_POST['content']);

			# Load into the DB
				DB::instance(DB_NAME)->insert('posts',$_POST);

				Router::redirect('/users/index');
		}

		public function relationships() {

			# Setup view
				$this->template->content = View::instance("v_posts_relationships");
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

	}

?>