<?php if(isset($error)): ?>
		<div class=" large-8 columns error"><p>
			Login failed. Double check your email and password.
		</p></div>
<?php endif; ?>

<form class="signup" method='POST' action='/users/p_signup'>

    <p>First Name</p>
    <input type='text' name='first_name' required>

    <p>Last Name</p>
    <input type='text' name='last_name' required>

    <p>Email</p>
    <input type='email' name='email' required>

    <p>Password</p>
    <input type='password' name='password' required>

    <input class="button" type='submit' value='Sign up'>

</form>

