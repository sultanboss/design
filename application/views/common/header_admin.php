    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?php echo base_url(); ?>admin">Akij Ceramics</a>
          <div class="nav-collapse collapse">
            <ul class="nav">

            <?php 
              $view = $this->uri->segment(2);

              if($view == 'tiles')
              {
                $home = '';
                $tiles = 'active';
                $rooms = '';
              }
              else if($view == 'rooms')
              {
                $home = '';
                $tiles = '';
                $rooms = 'active';
              }
              else
              {
                $home = 'active';
                $tiles = '';
                $rooms = '';
              }
            ?>


            <?php if($logged_in == 0) { ?>
              <li class="">
                <a href="#"><i class="icon-long-arrow-right"></i> <?php echo $title; ?></a>
              </li>
            <?php } else { ?>
              <li class="<?php echo $home; ?>">
                <a href="<?php echo base_url(); ?>admin">Home</a>
              </li>
              <li class="<?php echo $tiles; ?>">
                <a href="<?php echo base_url(); ?>admin/tiles">Tiles</a>
              </li>
              <li class="<?php echo $rooms; ?>">
                <a href="<?php echo base_url(); ?>admin/rooms">Rooms</a>
              </li>
            <?php } ?>
            </ul>
            
            <ul class="nav pull-right">              
              <li><a class="top-button" href="<?php echo base_url(); ?>"><button class="btn btn-info app-button"><i class="icon-external-link"></i> App</button></a></li>
              <?php if($logged_in == 1) { ?>
              <li><a class="top-button" href="<?php echo base_url(); ?>auth/logout"><button class="btn btn-danger logout-button"><i class="icon-signout"></i></button></a></li>
              <?php } ?>
            </ul>
            
          </div>
        </div>
      </div>
    </div>

    <div class="container container-admin">