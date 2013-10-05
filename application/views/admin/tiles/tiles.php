<ul class="well nav nav-pills">
    <li class="active"><a href="<?php echo base_url(); ?>admin/tiles"><i class="icon-list-alt"></i> List Tiles</a></li>
    <li><a href="<?php echo base_url(); ?>admin/tiles/add"><i class="icon-plus-sign-alt"></i> Add Tiles</a></li>
    <li><a href="#"><i class="icon-edit"></i> Edit Tiles</a></li>
</ul>

<div class="well-body">
	<?php 
	$type = '';
	foreach ($tiles as $tiles_item) {
	if($type != $tiles_item['tiles_type'])
	{	
		if($type != '')
			echo "</ul>";
		$type = $tiles_item['tiles_type'];
	?>
	<div class="clear"></div>
	<h3 class="nav-header title"><i class="icon-picture"></i> <?php echo $tiles_item['tiles_type']; ?></h3>
	<ul class="nav">
	<?php
	}
	$name = $tiles_item['tiles_code'];
	$ar = explode("_",$name);
	if(count($ar) > 1)
	{
		if($ar[0] == 'T')
			$name = $ar[1];
		else
			$name = $ar[4];
	}
	?>	
		<li>			
			<a href="<?php echo base_url().'admin/tiles/edit/'.$tiles_item['tiles_id'];?>"><img src="<?php echo $this->config->item('upload_url').'tiles_thumb/'.$tiles_item['tiles_code']; ?>.jpg"></a>
			<button class="btn btn-mini disabled" type="button"><?php echo $name; ?></button>
		</li>
	<?php } ?>
	</ul>
</div>