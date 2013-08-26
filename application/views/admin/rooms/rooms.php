<ul class="well nav nav-pills">
    <li class="active"><a href="<?php echo base_url(); ?>admin/rooms"><i class="icon-list-alt"></i> List Rooms</a></li>
    <li><a href="<?php echo base_url(); ?>admin/rooms/add"><i class="icon-plus-sign-alt"></i> Add Rooms</a></li>
    <li><a href="#"><i class="icon-edit"></i> Edit Rooms</a></li>
</ul>

<div class="well-body">
	<?php 
	$type = '';
	foreach ($rooms as $rooms_item) {
	if($type != $rooms_item['room_type'])
	{	
		if($type != '')
			echo "</ul>";
		$type = $rooms_item['room_type'];
	?>
	<div class="clear"></div>
	<h3 class="nav-header title"><i class="icon-picture"></i> <?php echo $rooms_item['room_type']; ?></h3>
	<ul class="nav">
	<?php
	}
	?>	
		<li>			
			<a href="<?php echo base_url().'admin/rooms/edit/'.$rooms_item['room_id'];?>"><img src="<?php echo $this->config->item('upload_url').$rooms_item['room_code']; ?>.jpg"></a>
			<button class="btn btn-mini disabled" type="button"><?php echo $rooms_item['room_code']; ?></button>
		</li>
	<?php } ?>
	</ul>
</div>