<?php
	class Post {

		public function add() {

			# Setup view
				$this->template->content = View::instance('v_posts_add');
				$this->template->title = "New Post";

			# Render template
				echo $this->template;
		}

		public function p_add() {
			# Add fields to post entry before writing to DB
				$_POST['user_id'] = $this->user->user_id;

				$_POST['created'] = Time::now();
				$_POST['modified'] = Time::now();
			# Write post to DB
				DB::instance(DB_NAME)->insert('posts',$_POST);

				echo "Your post has been added.";
		}		

		public static function autolink($string) {

			$content_array = explode(" ", $string);
			$output = '';

			foreach($content_array as $content) {

				# starts with http:
					if(substr($content, 0, 7) == "http://")
						$content = '
						<a href="' . $content . '">' . $content . '</a>';

				# starts with www.
				if(substr($content, 0, 4) == "www.")
					$content = '
					<a href="http://' . $content . '">' . $content . '</a>';

				$output .= " " . $content;
			}

			$output = trim($output);
			return $output;

		}

	}
?>