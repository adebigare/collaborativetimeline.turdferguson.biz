<?php if(isset($user_info)): ?>

<img src="<?=$user_info->avatar?>">

<h3><?=$user_info->first_name?> <?=$user_info->last_name?></h3>


<?php endif; ?>