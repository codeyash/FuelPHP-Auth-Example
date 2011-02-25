<p>
	<strong>Username:</strong>
	<?php echo $users->username; ?></p>
<p>
	<strong>Password:</strong>
	<?php echo $users->password; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $users->email; ?></p>
<p>
	<strong>Profile fields:</strong>
	<?php echo $users->profile_fields; ?></p>
<p>
	<strong>Group:</strong>
	<?php echo $users->group; ?></p>
<p>
	<strong>Last login:</strong>
	<?php echo $users->last_login; ?></p>
<p>
	<strong>Login hash:</strong>
	<?php echo $users->login_hash; ?></p>

<?php echo HTML::anchor('users/edit/'.$users->id, 'Edit'); ?> | 
<?php echo HTML::anchor('users', 'Back'); ?>