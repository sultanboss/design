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


    <div class="span4">
    <div class="top-right">
      <div class="navbar">
        <div class="navbar-inner top">
            <div class="nav-collapse collapse">
              <ul class="nav top-nav">
                <li>
                  <div class="btn-group">
                    <button class="btn btn-info btn-floor">Floor</button>
                    <button class="btn btn-info dropdown-toggle btn-floor-right" data-toggle="dropdown"><span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="#">Floor 2x2 (2)</a></li>
                      <li><a href="#">Floor 4x4 (2)</a></li>
                      <li class="divider"></li>
                      <li><a href="#">All Floors (4)</a></li>
                    </ul>
                  </div>
                </li>
                <li>
                  <div class="btn-group">
                    <button class="btn btn-success btn-wall">Wall</button>
                    <button class="btn btn-success dropdown-toggle btn-wall-right" data-toggle="dropdown"><span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="#">Wall 2x2 (2)</a></li>
                      <li><a href="#">Wall 4x4 (1)</a></li>
                      <li class="divider"></li>
                      <li><a href="#">All Walls (3)</a></li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
        </div>
      </div>
    </div>
    </div>


    <div class="preview-bar span8">
        <img class="preview-image loading-image" src="<?php echo $this->config->item('img_url'); ?>image.gif">
    </div>


    <div class="span4">
    <div class="wall-bar">
      <div class="navbar nav-wall">
        <div class="navbar-inner preview-wall">
            <div class="nav-collapse collapse nav-wall-content">
              <ul class="nav">
                <li>
                  <img class="wall-thumb img-polaroid" id="626-YE" src="<?php echo $this->config->item('upload_url'); ?>626-YE.jpg">
                  <div class="serial">626-YE</div>
                </li>
                <li>
                  <img class="wall-thumb img-polaroid" id="621-L" src="<?php echo $this->config->item('upload_url'); ?>621-L.jpg">
                  <div class="serial">621-L</div>
                </li>
                <li>
                  <img class="wall-thumb img-polaroid" id="624-R" src="<?php echo $this->config->item('upload_url'); ?>624-R.jpg">
                  <div class="serial">624-R</div>
                </li>                
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
                <li>
                  <img class="floor-thumb img-polaroid" id="6HP-64BR" src="<?php echo $this->config->item('upload_url'); ?>6HP-64BR.jpg">
                  <div class="serial">6HP-64BR</div>
                </li>
                <li>
                  <img class="floor-thumb img-polaroid" id="6HP-68" src="<?php echo $this->config->item('upload_url'); ?>6HP-68.jpg">
                  <div class="serial">6HP-68</div>
                </li>
                <li>
                  <img class="floor-thumb img-polaroid" id="312-BE" src="<?php echo $this->config->item('upload_url'); ?>312-BE.jpg">
                  <div class="serial">312-BE</div>
                </li>
                <li>
                  <img class="floor-thumb img-polaroid" id="312-BE1" src="<?php echo $this->config->item('upload_url'); ?>312-BE1.jpg">
                  <div class="serial">312-BE1</div>
                </li>
              </ul>
            </div>
        </div>
      </div>
    </div>
    </div>

    <div class="room-bar span12 navbar-fixed-bottom">
      <div class="navbar nav-room">
        <div class="navbar-inner">
            <div class="nav-collapse collapse nav-room-content">
              <ul class="nav">
                <li>
                  <img class="room-thumb img-polaroid" id="BED3" src="<?php echo $this->config->item('upload_url'); ?>Bed3.jpg">
                  <div class="room-serial">BED3</div>
                </li>
                <li>
                  <img class="room-thumb img-polaroid" id="BAT7" src="<?php echo $this->config->item('upload_url'); ?>BAT7.jpg">
                  <div class="room-serial">BAT7</div>
                </li>
              </ul>
            </div>
        </div>
      </div>
    </div>

  </div>
