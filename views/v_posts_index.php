<ul class="user_feed">
<?php foreach($posts as $post): ?>

	<li class="row"><article>
		<div class="large-4 columns">
		<p><?=$post['first_name']?> <?=$post['last_name']?> added:</p> 

		<p class="time"><time datetime="<?=Time::display($post['created'], 'Y-m-d G:i')?>">
			<?=Time::display($post['created'])?>
		</time></p>
		</div>

		<div class="large-8 columns">
		<h4><a href="<?=$post['content']?>"><?=$post['content_title']?></a></h4>
		</div>

	</article></li>

<?php endforeach; ?>
</ul>