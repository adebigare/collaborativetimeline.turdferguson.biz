<div class="row">

<div class="subhead">
	<h1>Log In and Share Your News!</h1>
</div>	

<?php if(isset($error)): ?>
		<div class=" large-8 columns error"><p>
			Login failed. Double check your email and password.
		</p></div>
<?php endif; ?>



	<div class="form large-6 large-centered columns">

		<form method='POST' action='/users/p_login'>

			<p>Email</p>
			<input type='text' name='email' required>

			<p>Password</p>
			<input type='password' name='password' required>

			<input class='button small radius' type='submit' value='Log in'>

		</form>

	</div>

</div>
