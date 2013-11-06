<?php if(isset($user_info)): ?>
	
        <h3><?=$user_info->first_name?></h3>


<?php else: ?>
        <h3>No user has been specified</h3>
<?php endif; ?>