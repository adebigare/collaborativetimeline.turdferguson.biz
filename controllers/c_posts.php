<?php

	class posts_controller extends base_controller {

		public function __construct() {
			parent::__construct();
		

			if(!$this->user){
				die("Oops, you've found a members only area, and you're not logged in.<a href='/users/login'>Login</a>");
			}
		}

		public function index() {

			$this->template->content = View::instance('v_posts_index');
			$this->template->title = 'Posts';

			$q = "SELECT
							posts .*,
							users.first_name,
							users.last_name 
						FROM posts
						INNER JOIN users
							ON posts.user_id = users.user_id";

			$posts = DB::instance(DB_NAME)->select_rows($q);

			$this->template->content->posts = $posts;

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
			$_POST['user_id'] = $this->user->user_id;

			$_POST['created'] = Time::now();
			$_POST['modified'] = Time::now();

			DB::instance(DB_NAME)->insert('posts',$_POST);

			echo "Your post has been added.";
		}

	}

?>