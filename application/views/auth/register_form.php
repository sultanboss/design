<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'placeholder'	=> 'Enter Username',
		'required' => 'required'
	);
}
$fname = array(
	'name'	=> 'fname',
	'id'	=> 'fname',
	'value'	=> set_value('fname'),
	'placeholder'	=> 'Enter First Name',
	'required' => 'required'
);
$lname = array(
	'name'	=> 'lname',
	'id'	=> 'lname',
	'value'	=> set_value('lname'),
	'placeholder'	=> 'Enter Last Name',
	'required' => 'required'
);
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'type' => 'email',
	'placeholder'	=> 'Enter Email Address',
	'required' => 'required'
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'type' => 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'placeholder'	=> 'Enter Password',
	'required' => 'required'
);

$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'placeholder'	=> 'Enter Code',
	'required' => 'required'
);
?>

<?php 
	$attributes = array('id' => 'myform', 'class' => 'form-horizontal admin-center'); 
	echo form_open($this->uri->uri_string(), $attributes); ?>

	<?php if ($use_username) { ?>
	<div class="control-group">
		<label class="control-label" for="<?php echo $username['id']; ?>"><?php echo $this->lang->line('auth_username'); ?></label>
		<div class="controls">
			<?php echo form_input($username); ?>
			<div class="error">
				<?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?>
			</div>		
		</div>
	</div>
	<?php } ?>

	<div class="control-group">
		<label class="control-label" for="<?php echo $fname['id']; ?>"><?php echo $this->lang->line('auth_fname'); ?></label>
		<div class="controls">
			<?php echo form_input($fname); ?>
			<div class="error">
				<?php echo form_error($fname['name']); ?>
			</div>		
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="<?php echo $lname['id']; ?>"><?php echo $this->lang->line('auth_lname'); ?></label>
		<div class="controls">
			<?php echo form_input($lname); ?>
			<div class="error">
				<?php echo form_error($lname['name']); ?>
			</div>		
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="<?php echo $email['id']; ?>"><?php echo $this->lang->line('auth_email'); ?></label>
		<div class="controls">
			<?php echo form_input($email); ?>
			<div class="error">
				<?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
			</div>		
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="<?php echo $password['id']; ?>"><?php echo $this->lang->line('auth_password'); ?></label>
		<div class="controls">
			<?php echo form_input($password); ?>
			<div class="error">
				<?php echo form_error($password['name']); ?>
			</div>		
		</div>
	</div>


	<?php 
	if ($captcha_registration) { ?>
		<?php
		if ($use_recaptcha) { ?>		
			<script type="text/javascript">
			$(document).ready(function() {
			    Recaptcha.create("<?php echo $this->config->item('recaptcha_public_key', 'tank_auth') ?>", "recaptcha_widget", {
			        "theme": "custom",
			        "callback": function() { } // this doesn't get called
			    });
			});
			</script>
				<div id="recaptcha_widget" style="display: none">
			    	<div class="control-group">
						<div class="controls">
							<div id="recaptcha_image" class="thumbnail"></div>
						</div>
					</div>
					 
					<div class="control-group recaptcha_input_fields">	
						<label class="control-label" for="<?php echo $captcha['id']; ?>"><?php echo $this->lang->line('auth_captcha_instruction'); ?></label>					 
						<div class="controls">
							<div class="input-append">
								<input type="text" id="recaptcha_response_field" class="input-recaptcha" name="recaptcha_response_field" />
								<a class="btn recaptcha_refresh" href="javascript:Recaptcha.reload()"><i class="icon-refresh"></i></a>
								<a class="btn recaptcha_only_if_audio" href="javascript:Recaptcha.switch_type('image')"><i title="Get an image CAPTCHA" class="icon-picture"></i></a>
							</div>
						    <div class="error">
								<?php echo form_error('recaptcha_response_field'); ?>	
							</div>
						</div>
					</div>
				</div>
		<?php } else {?>
		<div class="control-group">
			<label class="control-label" for="<?php echo $captcha['id']; ?>"><?php echo $this->lang->line('auth_captcha_instruction'); ?></label>
			<div class="controls">
				<?php echo $captcha_html; ?>
				<div class="captcha-input">
					<?php echo form_input($captcha); ?>	
				</div>
				<div class="error">
					<?php echo form_error($captcha['name']); ?>	
				</div>
			</div>
		</div>
		<?php } ?>
	<?php
	} ?>

	<div class="control-group">		
		<div class="controls login-button-box">
			<div class="left"><button class="btn btn-success signup-button" type="submit"><?php echo $this->lang->line('auth_signup'); ?></button></div>	
			<div class="clear"></div>
		</div>
	</div>

<?php echo form_close(); ?>