<?php if ($posts == NULL):  ?>
	<h3>It looks like you need some friends</h3>
	<?=$follow?>
<?php endif; ?>

<?php foreach($posts as $post): ?>

	<article>
		<h3><?=$post['first_name']?> <?=$post['last_name']?> posted:</h3> 

		<p><time datetime="<?=Time::display($post['created'], 'Y-m-d G:i')?>">
			<?=Time::display($post['created'])?>
		</time></p>

		<p><?=$post['content']?> </p>

	</article>

<?php endforeach; ?>