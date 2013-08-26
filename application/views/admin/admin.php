<ul class="well nav nav-pills">
    <li class="active"><a href="<?php echo base_url(); ?>admin"><i class="icon-list-alt"></i> Upload Photos</a></li>
</ul>

<?php
$attributes = array('id' => 'myform', 'class' => 'form-horizontal admin-left'); 
echo form_open($this->uri->uri_string(), $attributes); 

?>

	<div class="control-group">
		<label class="control-label" for="tiles_code">Upload Image</label>
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
                <div id="progress" class="progress progress-full progress-success progress-striped">
                    <div class="bar"></div>
                </div>
                <!-- The container for the uploaded files -->
                <div id="files" class="files"></div>  
        </div>      	 
    </div>
<?php echo form_close(); ?>