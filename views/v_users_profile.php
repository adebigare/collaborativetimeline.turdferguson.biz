<?php if(isset($user_info)): ?>

	<div class="subhead large-12 columns">
		<h1>Profile Settings</h1>
	</div>

	<div class="form row">

		<div class="large-4 columns">

			<img src="<?=$user_info->avatar?>">

			<h4><a href="/users/upload_profile_image">Upload New Profile Image</a></h4>

		</div>

		<div class="large-8 columns">

			<?php if($editing): ?>

				<form class="profile" method='POST' action='/users/p_update_profile'>

				    <p>First Name</p>
				    <input placeholder="<?=$user_info->first_name?>" type='text' name='first_name'>

				    <p>Last Name</p>
				    <input placeholder="<?=$user_info->last_name?>" type='text' name='last_name'>

				    <p>Email</p>
				    <input placeholder="<?=$user_info->email?>" type='text' name='email'>

				    <p>Website</p>
				    <input placeholder="<?=$user_info->website?>" type='text' name='website'>

				    <p>Twitter Handle</p>
				    <input placeholder="<?=$user_info->twitter_handle?>" type='text' name='website'>

				    <input class="button small radius" type='submit' value='Save'>

				</form>

			<?php else: ?>

				<ul class="profile_info">
					<li><h4><?=$user_info->first_name?></h4></li>
					<li><h4><?=$user_info->last_name?></h4></li>
					<li><h4><?=$user_info->email?></h4></li>
					<li><h4><?=$user_info->website?></h4></li>
					<li><h4><?=$user_info->twitter_handle?></h4></li>
				</ul>

				<h4><a href="/users/profile/edit">Edit my profile</a></h4>


			<?php endif; ?>
		</div>
	<?php endif; ?>
</div>


