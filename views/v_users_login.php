<h2>Log In and Post Some Cool Links!</h2>

<?php if(isset($error)): ?>
		<div class=" large-8 columns error"><p>
			Login failed. Double check your email and password.
		</p></div>
<?php endif; ?>

<div class="row">

	<div class="form prod large-6 large-centered columns">

		<form method='POST' action='/users/p_login'>

			<p>Email</p>
			<input type='text' name='email'>

			<p>Password</p>
			<input type='password' name='password'>

			<input class='button small radius' type='submit' value='Log in'>

		</form>

	</div>

</div>
