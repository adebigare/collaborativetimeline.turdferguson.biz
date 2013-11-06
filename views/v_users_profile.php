<?php if(isset($user_info)): ?>
	
        <h3><?=$user_info->first_name?></h3>

<?php else: ?>
        <h3>No user has been specified</h3>
<?php endif; ?>


<!-- <form class="signup" method='POST' action='/users/p_signup'>

    <p>First Name: <?=$first_name?> </p>
    <input label="" type='text' name='first_name'>

    <p>Last Name</p>
    <input type='text' name='last_name'>

    <p>Email</p>
    <input type='text' name='email'>

    <p>Password</p>
    <input type='password' name='password'>

    <input class="button" type='submit' value='Sign up'>

</form> -->