<?php
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = $this->lang->line('auth_email_or_login');
} else {
	$login_label = $this->lang->line('auth_email');
}

$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'placeholder'	=> 'Enter '.$login_label,
	'type'	=> 'email',
	'required' => 'required'
);
?>
<?php 
	$attributes = array('id' => 'myform', 'class' => 'form-horizontal admin-center'); 
	echo form_open($this->uri->uri_string(), $attributes); ?>

	<div class="control-group">
		<label class="control-label" for="<?php echo $login['id']; ?>"><?php echo $login_label; ?></label>
		<div class="controls">
			<?php echo form_input($login); ?>
			<div class="error">
				<?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>	
			</div>	
		</div>
	</div>

	<div class="control-group">		
		<div class="controls login-button-box">
			<div class="left"><button class="btn btn-success forgot-password-button" type="submit"><?php echo $this->lang->line('auth_get_new_password'); ?></button></div>	
			<div class="clear"></div>
		</div>
	</div>

<?php echo form_close(); ?>