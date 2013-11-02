<?php foreach($posts as $post): ?>

	<article>
		<h3><?=$post['first_name']?> <?=$post['last_name']?> posted:</h3> 

		<p><time datetime="<?=Time::display($post['created'], 'Y-m-d G:i')?>">
			<?=Time::display($post['created'])?>
		</time></p>

		<p><?=$post['content']?> </p>

	</article>

<?php endforeach; ?>