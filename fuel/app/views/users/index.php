<h2>Listing users</h2>

<table>
	<tr>
		<th>Username</th>
		<th>Password</th>
		<th>Email</th>
		<th>Profile fields</th>
		<th>Group</th>
		<th>Last login</th>
		<th>Login hash</th>
		<th></th>
		<th></th>
		<th></th>
	</tr>

	<?php foreach ($users as $users): ?>	<tr>

		<td><?php echo $users->username; ?></td>
		<td><?php echo $users->password; ?></td>
		<td><?php echo $users->email; ?></td>
		<td><?php echo $users->profile_fields; ?></td>
		<td><?php echo $users->group; ?></td>
		<td><?php echo $users->last_login; ?></td>
		<td><?php echo $users->login_hash; ?></td>
		<td><?php echo HTML::anchor('users/view/'.$users->id, 'View'); ?></td>
		<td><?php echo HTML::anchor('users/edit/'.$users->id, 'Edit'); ?></td>
		<td><?php echo HTML::anchor('users/delete/'.$users->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?></td>
	</tr>
	<?php endforeach; ?></table>

<br />

<?php echo HTML::anchor('users/create', 'Add new Users'); ?>