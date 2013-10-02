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
                <li id="bprice">
                  <button class="btn btn-danger btn-price" data-toggle="modal" data-target="#price_cal"><i class="icon-money"></i> Price Calculator</button>
                </li>
                <li id="bfloor">
                  <div class="btn-group top-floor">
                    <button class="btn btn-info btn-floor"><i class="icon-picture"></i> Floor Tiles</button>
                    <button class="btn btn-info dropdown-toggle btn-floor-right" data-toggle="dropdown"><i class="icon-caret-down"></i></button>
                    <ul class="dropdown-menu pull-right">
                      <?php 
                      $fall = 0;
                      foreach ($floors_category as $floors_category_item) { 
                      $fall = $fall + $floors_category_item['count(tiles_size)'];
                      ?>
                      <li><a id="f-<?php echo strtolower(str_replace(' ', '-', $floors_category_item['tiles_cat']).'-'.str_replace(' ', '-', $floors_category_item['tiles_size'])); ?>" href="#"><?php echo $floors_category_item['tiles_cat'].' '.$floors_category_item['tiles_size']; ?> <code><?php echo $floors_category_item['count(tiles_size)']; ?></code></a></li>
                      <?php } ?>
                      <li class="divider"></li>
                      <li><a id="f-all" href="#">All Floor Tiles <code><?php echo $fall ?></code></a></li>
                    </ul>
                  </div>
                </li>
                <li id="bwall">
                  <div class="btn-group top-wall">
                    <button class="btn btn-success btn-wall"><i class="icon-picture"></i> Wall Tiles</button>
                    <button class="btn btn-success dropdown-toggle btn-wall-right" data-toggle="dropdown"><i class="icon-caret-down"></i></button>
                    <ul class="dropdown-menu pull-right">
                      <?php 
                      $wall = 0;
                      foreach ($walls_category as $walls_category_item) { 
                      $wall = $wall + $walls_category_item['count(tiles_size)'];
                      ?>
                      <li><a id="w-<?php echo strtolower(str_replace(' ', '-', $walls_category_item['tiles_cat']).'-'.str_replace(' ', '-', $walls_category_item['tiles_size'])); ?>" href="#"><?php echo $walls_category_item['tiles_cat'].' '.$walls_category_item['tiles_size']; ?> <code><?php echo $walls_category_item['count(tiles_size)']; ?></code></a></li>
                      <?php } ?>
                      <li class="divider"></li>
                      <li><a id="w-all" href="#">All Wall Tiles <code><?php echo $wall ?></code></a></li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
        </div>
      </div>
    </div>

    <div id="price_cal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h5 id="myModalLabel">Akij Ceramics Price Calculator</h5>
      </div>
      <div class="modal-body">
        <div class="alert tiles-info-modal">
          <table border="0" width="100%">
            <tr>
              <td width=""><strong>Category :</strong></td>
              <td width="" id="mcat">Ceramics</td>
              <td align="right" width="50%" rowspan="4" id="mimg"><img id="mimage" class="img-polaroid" src="uploads/files/tiles_thumb/302-GR.jpg"></td>
            </tr>
            <tr>
              <td><strong>Size :</strong></td>
              <td id="msize">30cm x 30cm</td>
            </tr>
            <tr>
              <td><strong>Model :</strong></td>
              <td id="mmodel">302-GR</td>
            </tr>
            <tr>
              <td><strong>Price :</strong></td>
              <td id="mprice">39 Tk.</td>
            </tr>
          </table>
        </div>
        <div class="alert alert-info tiles-input-modal">
          <table border="0" width="100%">
            <tr>
              <td><strong>Room Size :</strong></td>
              <td>
                <input type="text" value="0" name="user_room_height" id="user_room_height" />
                <input type="text" value="0" name="user_room_width" id="user_room_width" />
              </td>
            </tr>
            <tr>
              <td><strong>Size Type :</strong></td>
              <td>
                <input type="hidden" name="modal-type" id="modal_type" value="Feets" />
                <div class="btn-group">
                <button class="btn btn-modal-type" data-toggle="dropdown">Feets</button>
                <button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-modal-type">
                  <li><a href="#">Feets</a></li>
                  <li><a href="#">Centimetres</a></li>
                  <li><a href="#">Inches</a></li>
                </ul>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <div class="tiles-result-arrow"><i class="icon-resize-horizontal"></i></div>
        <div class="alert alert-success tiles-price-modal">
          <table border="0" width="100%">
            <tr>
              <td valign="top" width="40%"><strong>Area :</strong></td>
              <td><span id="total_area">0</span> Square <span id="total_area_type">Feets</span></td>
            </tr>
            <tr>
              <td><strong>Quantity :</strong></td>
              <td><span id="total_piece">0.00</span> Pcs.</td>
            </tr>
            <tr>
              <td><strong>Net Price :</strong></td>
              <td ><span id="total_amount">0.00</span> Tk.</td>
            </tr>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Done</button>
      </div>
    </div>

    <div class="span8 preview-bar">
        <img class="preview-image" src="" alt="Please wait...">
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
                     $cls.= $valuex['room'].' '.$valuex['room'].'-w-'.strtolower(str_replace(' ', '-', $walls_item['tiles_cat']).'-'.str_replace(' ', '-', $walls_item['tiles_size'])).' ';
                     $i++;
                  };
                ?>
                <li class="<?php echo $cls;?>">
                  <img class="wall-thumb img-polaroid" id="<?php echo $walls_item['tiles_code'];?>" data-cat="<?php echo $walls_item['tiles_cat'];?>" data-size="<?php echo $walls_item['tiles_size'];?>" data-price="<?php echo $walls_item['tiles_price'];?>" src="<?php echo $this->config->item('upload_url').'tiles_thumb/'; ?><?php echo $walls_item['tiles_code'];?>.jpg">
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
                     $cls.= $valuex['room'].' '.$valuex['room'].'-f-'.strtolower(str_replace(' ', '-', $floors_item['tiles_cat']).'-'.str_replace(' ', '-', $floors_item['tiles_size'])).' ';
                     $i++;
                  };
                ?>
                <li class="<?php echo $cls;?>">
                  <img class="floor-thumb img-polaroid" id="<?php echo $floors_item['tiles_code'];?>" data-cat="<?php echo $floors_item['tiles_cat'];?>" data-size="<?php echo $floors_item['tiles_size'];?>" data-price="<?php echo $floors_item['tiles_price'];?>" src="<?php echo $this->config->item('upload_url').'tiles_thumb/'; ?><?php echo $floors_item['tiles_code'];?>.jpg">
                  <div class="serial"><?php echo $floors_item['tiles_code'];?></div>
                </li>
                <?php } ?>
              </ul>
            </div>
        </div>
      </div>
    </div>
    </div>

    <div class="share-bar well">    
      <a id="fb" data-placement="right" data-toggle="tooltip" data-original-title="Share On Facebook" href="https://www.facebook.com/sharer/sharer.php?s=100&p[url]=http://eventconnectbd.com/design/&p[title]=Click %26 See %7C Akij Ceramics Ltd.&p[images][0]=http://eventconnectbd.com/design/uploads/files/LIV23_312-BE_0.jpg&p[summary]=Akij Group is one of the pioneers of the manufacturing industry in Bangladesh." onclick="window.open(this.href,'targetWindow','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=600,height=400');return false;"><i class="icon-facebook-sign"></i></a>
      <a id="tw" data-placement="right" data-toggle="tooltip" data-original-title="Share On Twitter"  href="https://twitter.com/intent/tweet?text=Click %26 See %7C Akij Ceramics Ltd.&hashtags=&via=eventconnectbd&url=http://eventconnectbd.com/design/" onclick="window.open(this.href,'targetWindow','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=600,height=450');return false;"><i class="icon-twitter-sign"></i></a>
      <a id="gp" data-placement="right" data-toggle="tooltip" data-original-title="Share On Google+" href="https://plus.google.com/share?url==http://eventconnectbd.com/design/" onclick="window.open(this.href,'targetWindow','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=600,height=400');return false;"><i class="icon-google-plus-sign"></i></a>
      <a id="save" data-placement="right" data-toggle="tooltip" data-original-title="Save Image" href="#"><i class="icon-save"></i></a>
      <a id="info" data-placement="right" data-toggle="tooltip" data-original-title="Toggle Info" href="#" download><i class="icon-info-sign"></i></a>
    </div>

    <div class="alert tiles-info-bar">
      <table border="0">
        <tr>
          <td><strong>Category :</strong></td>
          <td id="cat">Ceramics</td>
        </tr>
        <tr>
          <td><strong>Size :</strong></td>
          <td id="size">30cm x 30cm</td>
        </tr>
        <tr>
          <td><strong>Model :</strong></td>
          <td id="model">302-GR</td>
        </tr>
        <tr>
          <td><strong>Price :</strong></td>
          <td id="price">39 Tk.</td>
        </tr>
      </table>
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
