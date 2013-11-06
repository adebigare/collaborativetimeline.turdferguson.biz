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
			$this->template->add_post = View::instance('v_posts_add');
			$this->template->title = 'Posts';

			$this->template->subhead = "<h1>Latest News</h1>";

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

	}

?>