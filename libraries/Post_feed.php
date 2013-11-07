<?php
	class Post_feed {

		# DB call for your posts and the posts of those you follow
		
			public static function user_feed ($user) {

		    $q = "SELECT 
	            posts.content,
	            posts.content_title,
	            posts.created,
	            posts.user_id AS post_user_id,
	            users_users.user_id AS follower_id,
	            users.first_name,
	            users.last_name
		        FROM posts
		        LEFT OUTER JOIN users_users 
	            ON posts.user_id = users_users.user_id_followed
		        INNER JOIN users 
	            ON posts.user_id = users.user_id
		        WHERE users_users.user_id = $user->user_id
		        	OR posts.user_id = $user->user_id
		        ORDER BY created DESC";

				$feed = DB::instance(DB_NAME)->select_rows($q);
				return $feed;

			}

		# Method to grab the meta tag "title" from the content page
			
			public static function get_remote_page_title ($url) {
				$data = file_get_contents($url);
				$regex = '/<title[^>]*>(.*)<\/title>/';
				preg_match($regex,$data,$match);

				return $match[1]; 
			}

	}
?>