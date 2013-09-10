<ul class="well nav nav-pills">
    <li><a href="<?php echo base_url(); ?>admin/rooms"><i class="icon-list-alt"></i> List Rooms</a></li>
    <li class="active"><a href="<?php echo base_url(); ?>admin/rooms/add"><i class="icon-plus-sign-alt"></i> Add Rooms</a></li>
    <li><a href="#"><i class="icon-edit"></i> Edit Rooms</a></li>
</ul>

<div class="add-body">
	<h3 class="nav-header title"><i class="icon-picture"></i> Add New Rooms :</h3>

	<?php
	$rooms_type = array(
		'name'	=> 'rooms_type',
		'id'	=> 'rooms_type',
		'value'	=> set_value('rooms_type'),
		'placeholder'	=> 'Enter Rooms Type',
		'required' => 'required'
	);
	
	$rooms_support_floor = array(
		'name'	=> 'rooms_support_floor',
		'id'	=> 'rooms_support_floor',
		'value'	=> set_value('rooms_support_floor'),
		'placeholder'	=> 'Support Floors',
		'required' => 'required'
	);
	
	$rooms_support_wall = array(
		'name'	=> 'rooms_support_wall',
		'id'	=> 'rooms_support_wall',
		'value'	=> set_value('rooms_support_wall'),
		'placeholder'	=> 'Support Walls',
		'required' => 'required'
	);	

	$rooms_type_value = 'Bed Room';
	$rooms_code_value = '';
	$rooms_support_floor = '0';
	$rooms_support_wall = '0';

	if(set_value('rooms_code') != '')
		$rooms_code_value = set_value('rooms_code');

	if(set_value('rooms_type') != '')
		$rooms_type_value = set_value('rooms_type');

	if(set_value('rooms_support_floor') != '')
		$rooms_support_floor = set_value('rooms_support_floor');

	if(set_value('rooms_support_wall') != '')
		$rooms_support_wall = set_value('rooms_support_wall');

	$fyes = 'active';
	$fno = '';

	$wyes = 'active';
	$wno = '';

	if($rooms_support_floor == '0')
	{
		$fno = 'active';
		$fyes = '';
	}

	if($rooms_support_wall == '0')
	{
		$wno = 'active';
		$wyes = '';
	}

	$attributes = array('id' => 'myform', 'class' => 'form-horizontal admin-left'); 
	echo form_open($this->uri->uri_string(), $attributes); ?>

	<input type="hidden" name="rooms_code" id="rooms_code" value="<?php echo $rooms_code_value;?>">
	<input type="hidden" name="rooms_type" id="rooms_type" value="<?php echo $rooms_type_value;?>">
	<input type="hidden" name="rooms_support_floor" id="rooms_support_floor" value="<?php echo $rooms_support_floor;?>">
	<input type="hidden" name="rooms_support_wall" id="rooms_support_wall" value="<?php echo $rooms_support_wall;?>">

	<div class="control-group">
		<label class="control-label" for="rooms_type">Room Type</label>
		<div class="controls">
			<div class="btn-group">
                <button class="btn btn-rooms-type" data-toggle="dropdown"><?php echo $rooms_type_value;?></button>
                <button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-rooms-type">
                  <li><a href="#">Bed Room</a></li>
                  <li><a href="#">Dining Room</a></li>
                  <li><a href="#">Living Room</a></li>
                </ul>
              </div>	
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="rooms_support_floor">Support Floors</label>
		<div class="controls">
			<div class="btn-group radio-buttons rooms-support-floor-buttons" data-toggle="buttons-radio">
			    <button type="button" id="1" class="btn btn-success <?php echo $fyes;?>">Yes</button>
			    <button type="button" id="0" class="btn btn-danger <?php echo $fno;?>">No</button>
    		</div>
    	</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="rooms_support_wall">Support Walls</label>
		<div class="controls">
			<div class="btn-group radio-buttons rooms-support-wall-buttons" data-toggle="buttons-radio">
			    <button type="button" id="1" class="btn btn-success <?php echo $wyes;?>">Yes</button>
			    <button type="button" id="0" class="btn btn-danger <?php echo $wno;?>">No</button>
    		</div>
    	</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="rooms_code">Room Image</label>
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
                		if($rooms_code_value != '')
                		{
                		?>
                			<p><img src="<?php echo base_url();?>uploads/files/rooms_thumb/<?php echo $rooms_code_value;?>.jpg" /></p>
                		<?php
                		}
                	?>
                </div>  
                <div class="error">
					<?php echo $rooms_code_error; ?>
				</div>  
        </div>      	 
    </div>

	<div class="control-group">		
		<div class="controls login-button-box">
			<div class="left"><button class="btn btn-success add-rooms-button" type="submit"><i class="icon-plus-sign-alt"></i> Add Room</button></div>	
			<div class="clear"></div>
		</div>
	</div>

	<?php echo form_close(); ?>

</div>