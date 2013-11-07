  <div class="row-fluid">

  <div class="share-bar-text" data-intro="Use these buttons for share and other functionalities." data-position="right"></div>
  <div class="price-cal-text" data-intro="Use this button for price calculation." data-position="bottom"></div>
  <div class="tiles-cat-text" data-intro="Use this button for changing category." data-position="bottom"></div>  
  <div class="room-change-text" data-intro="Select rooms for different view from here." data-position="right"></div> 
  <div class="room-cat-text" data-intro="Select room category from here." data-position="top"></div>
  <div class="tiles-change-text" data-intro="Select tiles to apply on room from here." data-position="left"></div>

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
              <ul class="nav top-nav" id="calPrice">
                <li id="bprice">
                  <button class="btn btn-danger btn-price" id="calPrice" data-toggle="modal tooltip" data-target="#price_cal" data-placement="bottom" data-original-title="Calculate Your Tiles Price"><i class="icon-money"></i> Price Calculator</button>
                </li>
                <li id="bfloor">
                  <div class="btn-group top-floor">
                    <button class="btn btn-info btn-floor"><i class="icon-picture"></i> Floor Tiles</button>
                    <button class="btn btn-info dropdown-toggle btn-floor-right" data-toggle="dropdown"><i class="icon-caret-down"></i></button>
                    <ul class="dropdown-menu">
                      <?php 
                      $fall = 0;
                      $fcat = ''; 
                      $fcat_val = 0;                     
                      foreach ($floors_category as $floors_category_item) { 
                      $fall = $fall + $floors_category_item['count(tiles_size)'];

                      if($floors_category_item['tiles_cat'] != $fcat)
                      {
                        if($fcat != '')
                          echo '<li class="divider"></li>';
                        $fcat = $floors_category_item['tiles_cat'];  
                        $fcat_val = 1;  
                      }
                      ?>
                      <li>
                        <?php
                        if($fcat_val == 1) 
                        {
                          echo '<dt><span class="text">'.$fcat.'</span></dt>';
                          $fcat_val = 0;
                        }
                        ?>
                        <a id="f-<?php echo strtolower(str_replace(' ', '-', $floors_category_item['tiles_cat']).'-'.str_replace(' ', '-', $floors_category_item['tiles_size'])); ?>" href="#"><?php echo $floors_category_item['tiles_size']; ?> <code><?php echo $floors_category_item['count(tiles_size)']; ?></code></a>
                      </li>
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
                    <ul class="dropdown-menu">
                      <?php 
                      $wall = 0;
                      $wcat = '';
                      $wcat_val = 0;
                      foreach ($walls_category as $walls_category_item) { 
                      $wall = $wall + $walls_category_item['count(tiles_size)'];
                      if($walls_category_item['tiles_cat'] != $wcat)
                      {
                        if($wcat != '')
                          echo '<li class="divider"></li>';
                        $wcat = $walls_category_item['tiles_cat'];  
                        $wcat_val = 1;  
                      }
                      ?>
                      <li>
                        <?php
                        if($wcat_val == 1) 
                        {
                          echo '<dt><span class="text">'.$wcat.'</span></dt>';
                          $wcat_val = 0;
                        }
                        ?>
                        <a id="w-<?php echo strtolower(str_replace(' ', '-', $walls_category_item['tiles_cat']).'-'.str_replace(' ', '-', $walls_category_item['tiles_size'])); ?>" href="#"><?php echo $walls_category_item['tiles_size']; ?> <code><?php echo $walls_category_item['count(tiles_size)']; ?></code></a>
                      </li>
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
        <h4 id="modal_label">Price Calculator</h4>
      </div>
      <div class="modal-body">
        <div class="alert tiles-info-modal">
          <table border="0" width="100%">
            <tr>
              <td width="17%"><strong>Category :</strong></td>
              <td width="50%:" id="mcat">Ceramics</td>
              <td align="right" width="50%" rowspan="4" id="mimg"><img id="mimage" class="img-polaroid" src="uploads/files/tiles_thumb/302-GR.jpg"></td>
            </tr>
            <tr>
              <td><strong>Size :</strong></td>
              <td id="msize">30cm x 30cm</td>
            </tr>
            <tr>
              <td><strong>Model :</strong></td>
              <td>
                <div id="simple-model"><span id="mmodel">302-GR</span></div>
                <div id="complex-model">
                  Top Half: <span id="mtophalf"></span><br/>
                  Decor: <span id="mdecor"></span><br/>
                  Border: <span id="mborder"></span><br/>
                  Bottom Half: <span id="mbothalf"></span><br/>
                </div>
              </td>
            </tr>
            <tr>
              <td><strong>Price :</strong></td>
              <td id="mprice">39 Tk.</td>
            </tr>
          </table>
        </div>
        <div class="alert alert-info tiles-input-modal">
          <table border="0" width="100%" style="margin-top:20px;">
            <tr>
              <td><strong>Room Size :</strong></td>
              <td>
                <input type="text" value="0" name="user_room_height" id="user_room_height" />
                <input type="text" value="0" name="user_room_width" id="user_room_width" />
              </td>
            </tr>
            <!-- <tr>
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
            </tr> -->
          </table>
        </div>
        <div class="tiles-result-arrow"><i class="icon-resize-horizontal"></i></div>
        <div class="alert alert-success tiles-price-modal">
          <table border="0" width="100%" style="margin-top:16px;">
            <tr>
              <td valign="top" width="40%"><strong>Area :</strong></td>
              <td><span id="total_area">0</span> Square <span id="total_area_type">Feets</span></td>
            </tr>
            <!-- <tr>
              <td><strong>Quantity :</strong></td>
              <td><span id="total_piece">0.00</span> Pcs.</td>
            </tr> -->
            <tr>
              <td><strong>Net Price :</strong></td>
              <td ><span id="total_amount">0.00</span> Tk.</td>
            </tr>
          </table>
        </div>       
      </div>
      <div class="modal-footer">
        <div id="extra_charge">** Extra charges will be applicable if you add decore or border tiles.</div><button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Done</button>
      </div>
    </div>

    <div id="border_tiles" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabe2" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="modal_label">List of Border Tiles</h4>
      </div>
      <div class="modal-body">
          <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
              <?php
              foreach ($border_tiles as $border_tiles_item) {
              ?>
              <div class="item">
                <img class="img-polaroid" src="uploads/files/<?php echo $border_tiles_item['tiles_code'];?>.jpg" alt="">
                <div class="alert item-caption">
                  <table border="0" width="100%">
                    <tr>
                      <td width="30%" align="right"><strong>Model :</strong></td>
                      <td><?php echo $border_tiles_item['tiles_code'];?></td>
                    </tr>
                    <tr>
                      <td align="right"><strong>Size :</strong></td>
                      <td><?php echo $border_tiles_item['tiles_size'];?></td>
                    </tr>
                    <tr>
                      <td align="right"><strong>Price :</strong></td>
                      <td><?php echo $border_tiles_item['tiles_price'];?> Tk.</td>
                    </tr>
                  </table>                  
                </div>
              </div>
              <?php
              }
              ?>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
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
                  $name = $walls_item['tiles_code'];
                  $cname = $walls_item['tiles_code'];
                  $ar = explode("_",$name);
                  if(count($ar) > 1)
                  {
                    if($ar[0] == 'T')
                      $name = $ar[1];
                    else
                      $name = $ar[4];

                    $cname = $ar[1].'_'.$ar[2].'_'.$ar[3].'_'.$ar[4];
                  }

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
                  <img class="wall-thumb img-polaroid" id="<?php echo $cname;?>" data-cat="<?php echo $walls_item['tiles_cat'];?>" data-size="<?php echo $walls_item['tiles_size'];?>" data-price="<?php echo $walls_item['tiles_price'];?>" data-model="<?php echo $walls_item['tiles_code'];?>" src="<?php echo $this->config->item('upload_url').'tiles_thumb/'; ?><?php echo $walls_item['tiles_code'];?>.jpg">
                  <div class="serial"><?php echo $name;?></div>
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
                  <img class="floor-thumb img-polaroid" id="<?php echo $floors_item['tiles_code'];?>" data-cat="<?php echo $floors_item['tiles_cat'];?>" data-size="<?php echo $floors_item['tiles_size'];?>" data-price="<?php echo $floors_item['tiles_price'];?>" data-model="<?php echo $floors_item['tiles_code'];?>" src="<?php echo $this->config->item('upload_url').'tiles_thumb/'; ?><?php echo $floors_item['tiles_code'];?>.jpg">
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
      <a id="fb" data-placement="right" data-toggle="tooltip" data-original-title="Share On Facebook" href="https://www.facebook.com/sharer/sharer.php?s=100&p[url]=http://akijceramics.net/livedemo/&p[title]=Live Demo - Akij Ceramics Ltd.&p[images][0]=http://akijceramics.net/livedemo/uploads/files/LIV23_312-BE_0.jpg&p[summary]=Akij Group is one of the pioneers of the manufacturing industry in Bangladesh." onclick="window.open(this.href,'targetWindow','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=600,height=400');return false;"><i class="icon-facebook-sign"></i></a>
      <a id="tw" data-placement="right" data-toggle="tooltip" data-original-title="Share On Twitter"  href="https://twitter.com/intent/tweet?text=Live Demo - Akij Ceramics Ltd.&hashtags=&via=AkijCeramicsLtd&url=http://akijceramics.net/livedemo/" onclick="window.open(this.href,'targetWindow','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=600,height=450');return false;"><i class="icon-twitter-sign"></i></a>
      <a id="gp" data-placement="right" data-toggle="tooltip" data-original-title="Share On Google+" href="https://plus.google.com/share?url==http://akijceramics.net/livedemo/" onclick="window.open(this.href,'targetWindow','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=600,height=400');return false;"><i class="icon-google-plus-sign"></i></a>
      <a id="save" data-placement="right" data-toggle="tooltip" data-original-title="Save Image" href="#"><i class="icon-save"></i></a>
      <a id="info" data-placement="right" data-toggle="tooltip" data-original-title="Toggle Info" href="#" download><i class="icon-info-sign"></i></a>
      <a id="help" data-placement="right" data-toggle="tooltip" data-original-title="Show Help" href="#"><i class="icon-question-sign"></i></a>
    </div>


    <div class="alert tiles-info-bar" data-intro="Here you can find seletcted tiles info." data-position="right">
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
          <td>
            <div id="info-simple-model"><span id="model">302-GR</span></div>
            <div id="info-complex-model">
              Top Half: <span id="ctophalf"></span><br/>
              Decor: <span id="cdecor"></span><br/>
              Border: <span id="cborder"></span><br/>
              Bottom Half: <span id="cbothalf"></span><br/>
            </div>
          </td>
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
