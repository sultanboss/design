<?php
if ($login_by_username AND $login_by_email) {
	$login_label = $this->lang->line('auth_email_or_login');
} else if ($login_by_username) {
	$login_label = $this->lang->line('auth_login');
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
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'placeholder'	=> 'Enter Password',
	'required' => 'required'
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'placeholder'	=> 'Enter Code',
	'required' => 'required'
);
?>
	<div class="facebook-signup-link">
		<form class="form-horizontal">			
		<div class="control-group">
			<label class="control-label" for="">Facebook</label>
			<div class="controls">
				<a href=""><img src="<?php echo $this->config->item('img_url'); ?>facebook.png" /></a>		
			</div>
		</div>	
		</form>			
	</div>
	<span class="or">OR</span>	
<?php
	$attributes = array('id' => 'myform', 'class' => 'form-horizontal'); 
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
		<label class="control-label" for="<?php echo $password['id']; ?>"><?php echo $this->lang->line('auth_password'); ?></label>
		<div class="controls">
			<?php echo form_password($password); ?>	
			<div class="error">
				<?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>	
			</div>	
		</div>
	</div>

	<?php 
	if ($show_captcha) { ?>
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
		<div class="controls">
			<label class="checkbox">
			<?php echo form_checkbox($remember); ?><?php echo $this->lang->line('auth_remember_me'); ?>
			</label>
		</div>
	</div>

	<div class="control-group">		
		<div class="controls login-button-box">
			<div class="left"><?php echo anchor('/auth/forgot_password/', $this->lang->line('auth_forgot_password'), array('data-toggle' => 'modal', 'data-target' => '#forgot_pass', 'data-dismiss' => 'modal', 'aria-hidden' => 'true')); ?></div>
			<div class="right"><button class="btn btn-inverse login-button" type="submit"><?php echo $this->lang->line('auth_login'); ?></button></div>	
			<div class="clear"></div>
		</div>
	</div>

	<div class="signup-link">	
		<div class="control-group">
			<label class="control-label"><?php echo $this->lang->line('auth_dont_have_account'); ?></label>
			<div class="controls">
				<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', $this->lang->line('auth_register'), array('class' => 'btn btn-inverse', 'role' => 'button', 'data-toggle' => 'modal', 'data-target' => '#signup', 'data-dismiss' => 'modal', 'aria-hidden' => 'true')); ?>			
			</div>
		</div>		
	</div>

<?php echo form_close(); ?>

	<script type="text/javascript">    
      $(document).ready(function(){

          $('.form-horizontal').submit(function(event) {
              var $form = $(this);
              var $target = $($form.attr('data-target'));

              $('#login .modal-body').html('<?php echo $this->config->item("loading_img"); ?>');
               
              $.ajax({
                type: $form.attr('method'),
                url: $form.attr('action'),
                data: $form.serialize(),
                 
                success: function(data, status) {
                  $('#login .modal-body').html(data);
                }
              });
               
              event.preventDefault();
          });
      }); 
      </script>