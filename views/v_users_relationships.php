
<table>
	<!-- Users' Status Table Title -->
  <thead>

    <tr>
    	<th>User</th>
    	<th>Status</th>
    	<th>Edit</th>
    </tr>

	</thead>
	<!-- Status Table Body -->
	<tbody>

		<?php foreach($users as $user): ?>

		<!-- If the logged in user is following another user -->
			<?php if(isset($connections[$user['user_id']])): ?>

				<tr>
					<th><?=$user['first_name']?> <?=$user['last_name']?></th>
					<th>Following</th>
					<th><a class="unfollow button small radius" href='/users/unfollow/<?=$user['user_id']?>'>Unfollow</a></th>
				</tr>
				
		<!-- If they aren't -->
			<?php else: ?>

				<tr>
					<th><?=$user['first_name']?> <?=$user['last_name']?></th>
					<th>Not Following</th>

					<th><a class="follow button small radius" href='/users/follow/<?=$user['user_id']?>'>Follow</a></th>
				</tr>

			<?php endif; ?>

		<?php endforeach; ?>

	</tbody>
</table>
