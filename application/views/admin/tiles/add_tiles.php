<ul class="well nav nav-pills">
    <li><a href="<?php echo base_url(); ?>admin/tiles"><i class="icon-list-alt"></i> List Tiles</a></li>
    <li class="active"><a href="<?php echo base_url(); ?>admin/tiles/add"><i class="icon-plus-sign-alt"></i> Add Tiles</a></li>
    <li><a href="#"><i class="icon-edit"></i> Edit Tiles</a></li>
</ul>

<div class="add-body">
	<h3 class="nav-header title"><i class="icon-picture"></i> Add New Tiles :</h3>

	<?php
	$tiles_type = array(
		'name'	=> 'tiles_type',
		'id'	=> 'tiles_type',
		'value'	=> set_value('tiles_type'),
		'placeholder'	=> 'Enter Tiles Type',
		'required' => 'required'
	);
	
	$tiles_size = array(
		'name'	=> 'tiles_size',
		'id'	=> 'tiles_size',
		'value'	=> set_value('tiles_size'),
		'placeholder'	=> 'Enter Tiles Size',
		'required' => 'required'
	);
	
	$tiles_price = array(
		'name'	=> 'tiles_price',
		'id'	=> 'tiles_price',
		'value'	=> set_value('tiles_price'),
		'placeholder'	=> 'Enter Tiles Price',
		'required' => 'required'
	);	

	$tiles_type_value = 'Floors';
	$tiles_size_value = 'Ceramics 30cm x 30cm';
	$tiles_code_value = set_value('tiles_type');

	if(set_value('tiles_type') != '')
		$tiles_type_value = set_value('tiles_type');

	if(set_value('tiles_size') != '')
		$tiles_size_value = set_value('tiles_size');

	$attributes = array('id' => 'myform', 'class' => 'form-horizontal admin-left'); 
	echo form_open($this->uri->uri_string(), $attributes); ?>

	<input type="hidden" name="tiles_code" id="tiles_code" value="<?php echo $tiles_code_value;?>">
	<input type="hidden" name="tiles_type" id="tiles_type" value="<?php echo $tiles_type_value;?>">
	<input type="hidden" name="tiles_size" id="tiles_size" value="<?php echo $tiles_size_value;?>">

	<div class="control-group">
		<label class="control-label" for="tiles_type">Tiles Type</label>
		<div class="controls">
			<div class="btn-group">
                <button class="btn btn-tiles-type" data-toggle="dropdown"><?php echo $tiles_type_value;?></button>
                <button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-tiles-type">
                  <li><a href="#">Floors</a></li>
                  <li><a href="#">Walls</a></li>
                </ul>
              </div>	
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="tiles_size">Tiles Size</label>
		<div class="controls">
			<div class="btn-group">
                <button class="btn btn-tiles-size" data-toggle="dropdown"><?php echo $tiles_size_value;?></button>
                <button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-tiles-size">
                  <li><a href="#">Ceramics 30cm x 30cm</a></li>
                  <li><a href="#">Ceramics 40cm x 40cm</a></li>
                  <li><a href="#">Printed Porcelain 30cm x 30cm</a></li>
                  <li><a href="#">Printed Porcelain 40cm x 40cm</a></li>
                  <li><a href="#">Printed Porcelain 60cm x 60cm</a></li>
                </ul>
              </div>	
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="<?php echo $tiles_price['id']; ?>">Tiles Price</label>
		<div class="controls">
			<div class="input-prepend">
			    <span class="add-on">৳</span>
			    <?php echo form_input($tiles_price); ?>
		    </div>		
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="tiles_code">Tiles Image</label>
        <div class="controls add-photo">
                <span class="btn btn-info fileinput-button">
                    <i class="icon-plus icon-white"></i>
                    <span>Choose Photo(s)</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="files[]" multiple>
                </span>
                <br>
                <br>
                <!-- The global progress bar -->
                <div id="progress" class="progress progress-success progress-striped">
                    <div class="bar"></div>
                </div>
                <!-- The container for the uploaded files -->
                <div id="files" class="files">
                	<?php
                		if($tiles_code_value != '')
                		{
                		?>
                			<p><img src="<?php echo base_url();?>uploads/files/tiles_thumb/<?php echo $tiles_code_value;?>.jpg" /></p>
                		<?php
                		}
                	?>
                </div>  
                <div class="error">
					<?php echo $tiles_code_error; ?>
				</div>  
        </div>      	 
    </div>

	<div class="control-group">		
		<div class="controls login-button-box">
			<div class="left"><button class="btn btn-success add-tiles-button" type="submit"><i class="icon-plus-sign-alt"></i> Add Tiles</button></div>	
			<div class="clear"></div>
		</div>
	</div>

	<?php echo form_close(); ?>

</div>