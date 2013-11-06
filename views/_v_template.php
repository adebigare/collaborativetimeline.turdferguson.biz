<!DOCTYPE html>
<html>
<head>
	<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
	<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />

	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" href="favicon.gif" type="image/gif">
	<link rel="shortcut icon" type="image/gif" href="http://www.dataswap2013.com/favicon.gif" />

	<link rel="stylesheet" type="text/css" href="/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="/css/foundation.css" />
	<link rel="stylesheet" type="text/css" href="/css/style.css" />

	<script src="foundation/js/vendor/custom.modernizr.js"></script>

						
	<?php 
		if(isset($client_files_head)) echo $client_files_head; 
	?>
	
</head>

<body> 
	<div id='menu'>

		<nav class="top-bar fixed" data-options="is_hover:false">
		 	<ul class="title-area">
				<li class="name">
					<h1><a href="/">Home</a></h1>
				</li>
				<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		 	</ul>

	 		<section class="top-bar-section">
				<ul class="right">
		 	  	<li class="divider"></li>
				<!-- Menu for users who are logged in -->
					<?php if($user): ?>
							<li class="divider"></li>
							<li><a href='/users/profile'>Profile</a></li>
							<li class="divider"></li>
							<li><a href='/posts/index'>Posts</a></li>
							<li class="divider"></li>
							<li><a href='/users/relationships'>Collaborators</a></li>
							<li class="divider"></li>
							<li><a href='/users/logout'>Logout</a></li>

				<!-- Menu options for users who are not logged in -->
					<?php else: ?>
							<li class="divider"></li>
							<li><a href='/users/login'>Log in</a></li>
					<?php endif; ?>

				</ul>			
			</section>

		</nav>

	</div> 
<!-- End Navigation -->

<!-- +1 features callout -->
	<div id="feature-wrapper">
		<div class="row" id="feature">
			<div class="large-9 large-centered columns">
				<ul>
					<li><h4> +1 Features:</h4></li>
					<li><h4><a href="/users/profile/edit">Edit Profile</a></h4></li>
					<li><h4> <a href="/users/profile/upload_profile_image">Upload A Profile Photo</a></h4></li>
				</ul>
			</div>
		</div>
	</div>

<!-- Main content section -->
	<div id="main">

		<div id="wrapper" class="row">

		<!-- Add in a page heading, if available -->
			<?php if(isset($subhead)): ?>

				<div class="subhead large-12 columns">
					<?php echo $subhead?>
				</div>

			<?php endif;?>	
		<!-- End Headings -->

		<!-- Grid for view with Profile Module -->
			<?php if(isset($profile_widget)):?>

				<div class="large-3 columns">
					<?php echo $profile_widget;?>
				</div>

			  <div class="large-9 columns" id="inserted-content">

			 		<?php if(isset($add_post)) echo $add_post; ?>
			 		<?php if(isset($content)) echo $content; ?>
			 	
			 	</div>

	 	<!-- Grid for view w/o Pro. Mod. -->
			<?php else:?>

			  <div class="large-10 large-centered columns" id="inserted-content">

					<?php if(isset($add_post)) echo $add_post; ?>
					<?php if(isset($content)) echo $content; ?>
					<?php if(isset($secondary)) echo $secondary; ?>

				</div>

			<?php endif;?>
		<!-- End Content -->

		</div>
		<?php if(isset($client_files_body)) echo $client_files_body; ?>
	</div>


	<script>
		document.write('<script src=' +
		('__proto__' in {} ? 'foundation/js/vendor/zepto' : 'foundation/js/vendor/jquery') +
		'.js><\/script>')
	</script>
	<script src="/js/vendor/zepto.js"></script>
	<script src="/js/vendor/jquery.js"></script>
	<script src="/js/vendor/readmore.js"></script>
	<script src="/js/foundation/foundation.js"></script>
	<script src="/js/foundation/foundation.topbar.js"></script>
	<script src="/js/foundation/foundation.section.js"></script>
	<script src="/js/foundation/foundation.reveal.js"></script>
	<script src="/js/foundation/foundation.magellan.js"></script>
	<script>
	  $(document).foundation();
	</script>

</body>
</html>