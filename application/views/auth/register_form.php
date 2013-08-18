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
$zip = array(
	'name'	=> 'zip',
	'id'	=> 'zip',
	'value'	=> set_value('zip'),
	'placeholder'	=> 'Enter Zip Code',
	'required' => 'required',
);

$agree = array(
	'name'	=> 'agree',
	'id'	=> 'agree',
	'value'	=> 1,
	'checked'	=> set_value('agree'),
	'required' => 'required'
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

	<div class="control-group">
		<label class="control-label" for="<?php echo $zip['id']; ?>"><?php echo $this->lang->line('auth_zip'); ?></label>
		<div class="controls">
			<?php echo form_input($zip); ?>
			<div class="error">
				<?php echo form_error($zip['name']); ?>	
			</div>		
		</div>
	</div>

	<?php
        $bday = set_value('birthday').'';
        if($bday == '')
        	$bday ='01/Jan/2000';
    ?>

	<div class="control-group">
		<label class="control-label" for="birthday"><?php echo $this->lang->line('auth_birthday'); ?></label>
		<div class="controls">
              <div class="btn-group">
                <button class="btn btn-bmonth" data-toggle="dropdown"><?php echo substr($bday, 3, 3);?></button>
                <button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-bmonth">
                  <li><a href="#">Jan</a></li>
                  <li><a href="#">Feb</a></li>
                  <li><a href="#">Mar</a></li>
                  <li><a href="#">Apr</a></li>
                  <li><a href="#">May</a></li>
                  <li><a href="#">Jun</a></li>
                  <li><a href="#">Jul</a></li>
                  <li><a href="#">Aug</a></li>
                  <li><a href="#">Sep</a></li>
                  <li><a href="#">Oct</a></li>
                  <li><a href="#">Nov</a></li>
                  <li><a href="#">Dec</a></li>
                </ul>
              </div>
              <div class="btn-group">
                <button class="btn btn-bday" data-toggle="dropdown"><?php echo substr($bday, 0, 2);?></button>
                <button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-bday">
                	<?php 
                	for ($i = 1; $i <= 31; $i++) { 
                		if($i < 10)
                			echo '<li><a href="#">0'.$i.'</a></li>';
                		else
                			echo '<li><a href="#">'.$i.'</a></li>';
                	}
                	?>                  
                </ul>
              </div>
              <div class="btn-group">
                <button class="btn btn-byear" data-toggle="dropdown"><?php echo substr($bday, 7, 4);?></button>
                <button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-byear">
                  <?php 
                    $year = date('Y');
                	for ($i = $year; $i >= ($year-100); $i--) { 
                		echo '<li><a href="#">'.$i.'</a></li>';
                	}
                	?>
                </ul>
              </div>           
              
			  <input type="hidden" name="birthday" id="birthday" value="<?php echo $bday; ?>">	
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
		<div class="controls">
			<label class="checkbox">
			<?php echo form_checkbox($agree); ?><?php echo $this->lang->line('auth_agree_terms'); ?>
			</label>
		</div>
	</div>

	<div class="control-group">		
		<div class="controls login-button-box">
			<div class="left"></div>
			<div class="right"><button class="btn btn-inverse login-button" type="submit"><?php echo $this->lang->line('auth_signup'); ?></button></div>	
			<div class="clear"></div>
		</div>
	</div>

<?php echo form_close(); ?>

	<script type="text/javascript">    
      $(document).ready(function(){

      	$('.dropdown-bmonth li a').click(function(){
      	  	$('.btn-bmonth').text($(this).text());
      	  	$('#birthday').val($('.btn-bday').text() + '/' + $('.btn-bmonth').text() + '/' + $('.btn-byear').text());
      	});

      	$('.dropdown-bday li a').click(function(){
      	  	$('.btn-bday').text($(this).text());
      	  	$('#birthday').val($('.btn-bday').text() + '/' + $('.btn-bmonth').text() + '/' + $('.btn-byear').text());
      	});

      	$('.dropdown-byear li a').click(function(){
      	  	$('.btn-byear').text($(this).text());
      	  	$('#birthday').val($('.btn-bday').text() + '/' + $('.btn-bmonth').text() + '/' + $('.btn-byear').text());
      	});

        $('.form-horizontal').submit(function(event) {
            var $form = $(this);
            var $target = $($form.attr('data-target'));

            $('#signup .modal-body').html('<?php echo $this->config->item("loading_img"); ?>');
               
            $.ajax({
                type: $form.attr('method'),
                url: $form.attr('action'),
                data: $form.serialize(),
                 
                success: function(data, status) {
                  $('#signup .modal-body').html(data);
                }
            });
               
            event.preventDefault();
        });
      }); 
      </script>