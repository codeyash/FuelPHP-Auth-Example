<?php echo Form::open(); ?>
	<p>
		<label for="username">Username:</label>
		<?php echo Form::input('username', Input::post('username', isset($users) ? $users->username : '')); ?>
	</p>
	<p>
		<label for="password">Password:</label>
		<?php echo Form::input('password', Input::post('password', isset($users) ? $users->password : '')); ?>
	</p>
	<p>
		<label for="email">Email:</label>
		<?php echo Form::input('email', Input::post('email', isset($users) ? $users->email : '')); ?>
	</p>
	<p>
		<label for="profile_fields">Profile fields:</label>
		<?php echo Form::textarea('profile_fields', Input::post('profile_fields', isset($users) ? $users->profile_fields : '')); ?>
	</p>
	<p>
		<label for="group">Group:</label>
		<?php echo Form::input('group', Input::post('group', isset($users) ? $users->group : '')); ?>
	</p>
	<p>
		<label for="last_login">Last login:</label>
		<?php echo Form::input('last_login', Input::post('last_login', isset($users) ? $users->last_login : '')); ?>
	</p>
	<p>
		<label for="login_hash">Login hash:</label>
		<?php echo Form::input('login_hash', Input::post('login_hash', isset($users) ? $users->login_hash : '')); ?>
	</p>

	<div class="actions">
		<?php echo Form::submit(); ?>	</div>

<?php echo Form::close(); ?>