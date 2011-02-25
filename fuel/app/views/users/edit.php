<h2>Editing users</h2>

<?php echo render('users/_form'); ?>

<?php echo HTML::anchor('users/view/'.$users->id, 'View'); ?> |
<?php echo HTML::anchor('users', 'Back'); ?>