<p>Dear <?php echo $User->username; ?>,</p>

<p>You may change your password using the link below.</p>
<?php $url = 'http://localhost/direct2door.erp'.'/users/resetpasswordtoken/' .$User->reset_password_token; ?>
<p>
<?php echo $this->Html->link('click here to reset password', $url, array('target' => '_blank')); ?>
</p>
<p>Your password won't change until you access the link above and create a new one.</p>
<p>Thanks and have a nice day!</p>

