<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
if(isset($message)) echo $message;

echo form_open();
echo form_label('Username:','username');
echo form_error('username');
echo form_input('username',set_value('username'));
echo form_label('Password:','password');
echo form_error('password');
echo form_password('password');
echo form_submit('submit','Login');
echo form_close();
?>