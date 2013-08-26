  <div class="row-fluid">


    <div class="top-left-bar span8">
      <div class="navbar">
        <div class="navbar-inner top-logo">
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li>
                  <a href=""><img class="logo" src="<?php echo $this->config->item('img_url'); ?>logo.png" /></a>
                </li>
              </ul>
            </div>
        </div>
      </div>
    </div>


    <div class="span4 top-right">
      <div class="navbar">
        <div class="navbar-inner top">
            <div class="nav-collapse collapse">
              <ul class="nav top-nav">
                <li>
                  <div class="btn-group top-floor">
                    <button class="btn btn-info btn-floor"><i class="icon-picture"></i> Floor</button>
                    <button class="btn btn-info dropdown-toggle btn-floor-right" data-toggle="dropdown"><i class="icon-caret-down"></i></button>
                    <ul class="dropdown-menu">
                      <?php 
                      $fall = 0;
                      foreach ($floors_category as $floors_category_item) { 
                      $fall = $fall + $floors_category_item['count(tiles_size)'];
                      ?>
                      <li><a id="f-<?php echo $floors_category_item['tiles_size']; ?>" href="#"><?php echo $floors_category_item['tiles_type'].' '.$floors_category_item['tiles_size']; ?> <code><?php echo $floors_category_item['count(tiles_size)']; ?></code></a></li>
                      <?php } ?>
                      <li class="divider"></li>
                      <li><a id="f-all" href="#">All <?php echo $floors_category_item['tiles_type']; ?> <code><?php echo $fall ?></code></a></li>
                    </ul>
                  </div>
                </li>
                <li>
                  <div class="btn-group top-wall">
                    <button class="btn btn-success btn-wall"><i class="icon-picture"></i> Wall</button>
                    <button class="btn btn-success dropdown-toggle btn-wall-right" data-toggle="dropdown"><i class="icon-caret-down"></i></button>
                    <ul class="dropdown-menu">
                      <?php 
                      $wall = 0;
                      foreach ($walls_category as $walls_category_item) { 
                      $wall = $wall + $walls_category_item['count(tiles_size)'];
                      ?>
                      <li><a id="w-<?php echo $walls_category_item['tiles_size']; ?>" href="#"><?php echo $walls_category_item['tiles_type'].' '.$walls_category_item['tiles_size']; ?> <code><?php echo $walls_category_item['count(tiles_size)']; ?></code></a></li>
                      <?php } ?>
                      <li class="divider"></li>
                      <li><a id="w-all" href="#">All <?php echo $walls_category_item['tiles_type']; ?> <code><?php echo $wall ?></code></a></li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
        </div>
      </div>
    </div>


    <div class="preview-bar span8">
        <img class="preview-image" src="" alt="Sorry! There is no room in this category.">
    </div>


    <div class="span4">
    <div class="wall-bar">
      <div class="navbar nav-wall">
        <div class="navbar-inner preview-wall">
            <div class="nav-collapse collapse nav-wall-content">
              <ul class="nav">
                <?php foreach ($walls as $walls_item) {
                  $cls = ''; 
                  $i = 0;
                  foreach ($walls_item['supported_tiles'] as $keyx => $valuex) {
                     $rm = strtolower(substr($valuex['room'], 0, 3));
                     if($i == 0)
                       $cls.= $rm.' ';                     
                     $cls.= $valuex['room'].' '.$valuex['room'].'-'.substr($valuex['tiles'], 0,1).'-'.$walls_item['tiles_size'].' ';
                     $i++;
                  };
                ?>
                <li class="<?php echo $cls;?>">
                  <img class="wall-thumb img-polaroid" id="<?php echo $walls_item['tiles_code'];?>" src="<?php echo $this->config->item('upload_url').'tiles_thumb/'; ?><?php echo $walls_item['tiles_code'];?>.jpg">
                  <div class="serial"><?php echo $walls_item['tiles_code'];?></div>
                </li>
                <?php } ?>
              </ul>
            </div>
        </div>
      </div>
    </div>

    <div class="floor-bar">
      <div class="navbar nav-floor">
        <div class="navbar-inner preview-floor">
            <div class="nav-collapse collapse nav-floor-content">
              <ul class="nav">
                <?php foreach ($floors as $floors_item) { 
                  $cls = ''; 
                  $i = 0;
                  foreach ($floors_item['supported_tiles'] as $keyx => $valuex) {
                     $rm = strtolower(substr($valuex['room'], 0, 3));
                     if($i == 0)                
                       $cls.= $rm.' ';                     
                     $cls.= $valuex['room'].' '.$valuex['room'].'-'.substr($valuex['tiles'], 0,1).'-'.$floors_item['tiles_size'].' ';
                     $i++;
                  };
                ?>
                <li class="<?php echo $cls;?>">
                  <img class="floor-thumb img-polaroid" id="<?php echo $floors_item['tiles_code'];?>" src="<?php echo $this->config->item('upload_url').'tiles_thumb/'; ?><?php echo $floors_item['tiles_code'];?>.jpg">
                  <div class="serial"><?php echo $floors_item['tiles_code'];?></div>
                </li>
                <?php } ?>
              </ul>
            </div>
        </div>
      </div>
    </div>
    </div>

    <div class="room-bar span8">
      <div class="navbar nav-room">
        <div class="navbar-inner collapse nav-room-content">
            <div class="nav-collapse">
              <ul class="nav">
                <?php foreach ($rooms as $rooms_item) { ?>
                <li class="<?php echo strtolower(substr($rooms_item['room_code'], 0, 3));?>" id="<?php echo $rooms_item['room_code'];?>x">
                  <img class="room-thumb img-polaroid" id="<?php echo $rooms_item['room_code'];?>" src="<?php echo $this->config->item('upload_url').'rooms_thumb/'; ?><?php echo $rooms_item['room_code'];?>.jpg">
                  <div class="room-serial"><?php echo $rooms_item['room_code'];?></div>
                </li>
                <?php } ?>
              </ul>
            </div>
        </div>
      </div>
    </div>

    <div class="room-bar-right span4">
      <div class="navbar nav-room-right">
        <div class="navbar-inner collapse nav-room-right-content">  
          <ul class="nav"> 
            <?php 
            $i = 0;
            foreach ($rooms_type as $rooms_type_item) { 
            ?>
            <li>       
              <input type="radio" id="<?php echo $rooms_type_item['room_type_code'];?>" name="room-type" class="room-type" autocomplete="off" />
              <label for="<?php echo $rooms_type_item['room_type_code'];?>"><span></span><?php echo $rooms_type_item['room_type_name'];?></label>
            </li>
            <?php 
            $i++;
            } ?>
          </ul>   
        </div>
      </div>
    </div>

  </div>
