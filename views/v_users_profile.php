
<div class="subhead large-12 columns">
</div>

<?php if(isset($user_info)): ?>

	<?php if($success): ?>
			<div class="error">
				<p>
			   Your changes have been saved!
				</p>
			</div>
	<?php endif; ?>

	<div class="form row">
		<div class="large-12 columns">

		<div class="large-4 columns">

			<img src="<?=$user_info->avatar?>">

			<h4><a href="/users/upload_profile_image">Upload New Profile Image</a></h4>

		</div>

		<div class="large-8 columns">

			<?php if($editing): ?>

				<form class="profile" method='POST' action='/users/p_update_profile'>

				    <p>First Name</p>
				    <input placeholder="<?=$user_info->first_name?>" type='text' name='first_name' value="<?=$user_info->first_name?>">

				    <p>Last Name</p>
				    <input placeholder="<?=$user_info->last_name?>" type='text' name='last_name' value="<?=$user_info->last_name?>">

				    <p>Email</p>
				    <input placeholder="<?=$user_info->email?>" type='text' name='email' value="<?=$user_info->email?>">

				    <p>Website</p>
				    <input placeholder="<?=$user_info->website?>" type='text' name='website' value="<?=$user_info->website?>">

				    <p>Twitter Handle</p>
				    <input placeholder="<?=$user_info->twitter_handle?>" type='text' name='twitter_handle' value="<?=$user_info->twitter_handle?>">

				    <input class="button small radius" type='submit' value='Save'>
				    <input href="/users/profile" class="button small radius" type='submit' value='Cancel'>

				</form>

			<?php else: ?>

				<ul class="profile_info">
					<li>Name:<h4><?=$user_info->first_name?> <?=$user_info->last_name?></h4></li>
					<li>Email:<h4><?=$user_info->email?></h4></li>
					<li>Personal Website:<h4><?=$user_info->website?></h4></li>
					<li>Twitter Handle:<h4><?=$user_info->twitter_handle?></h4></li>
				</ul>

				<h4><a href="/users/profile/edit">Edit my profile</a></h4>


			<?php endif; ?>
		</div>
	<?php endif; ?>
</div>
</div>


