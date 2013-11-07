<?php if(isset($user_info)): ?>

<img class="avatar" src="<?=$user_info->avatar?>">

<h4><?=$user_info->first_name?> <?=$user_info->last_name?></h4>
<input href="/users/profile/edit" class="button tiny radius" type='submit' value='Edit Your Profile'>

<?php endif; ?>