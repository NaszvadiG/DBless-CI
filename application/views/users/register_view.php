<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
if(isset($message)) echo $message;

echo form_open();
echo form_label('Username:','username');
echo form_error('username');
echo form_input('username',set_value('username'));
echo form_label('Email:','email');
echo form_error('email');
echo form_input('email',set_value('email'));
echo form_label('Password:','password');
echo form_error('password');
echo form_password('password');
echo form_submit('submit','Register');
echo form_close();
?>