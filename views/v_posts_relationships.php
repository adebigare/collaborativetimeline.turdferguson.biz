<div class="large-8 large-centered columns">
	<?php foreach($users as $user): ?>
		<p>

		<?php if(isset($connections[$user['user_id']])): ?>
			You are currently following <?=$user['first_name']?> <?=$user['last_name']?>
			<a class="button small radius" href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a>

		<?php else: ?>
			You are not following <?=$user['first_name']?> <?=$user['last_name']?>
			<a class="button small radius" href='/posts/follow/<?=$user['user_id']?>'>Follow</a>
		<?php endif; ?></p>


	<?php endforeach; ?>
</div>