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

						
	<!-- Controller Specific JS/CSS -->
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
					<li><a href='/users/logout'>Logout</a></li>
					<li class="divider"></li>
					<li><a href='/users/profile'>Profile</a></li>
					<li class="divider"></li>
					<li><a href='/posts/index'>Posts</a></li>

		<!-- Menu options for users who are not logged in -->
			<?php else: ?>
					<li class="divider"></li>
					<li><a href='/users/login'>Log in</a></li>
			<?php endif; ?>

				</ul>
			</section>

	</div>
	<!-- Header/Splash Page -->
	<div id="main">

		<!-- End Header/Splash -->

		<div id="wrapper" class="row">

		  <div id="inserted-content" class="large-10 large-centered columns">

				<?php if(isset($content)) echo $content; ?>
				<?php if(isset($add_post)) echo $add_post; ?>
				<?php if(isset($secondary)) echo $secondary; ?>
				<?php if(isset($client_files_body)) echo $client_files_body; ?>

			</div>

		</div>
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