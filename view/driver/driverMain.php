
<!DOCTYPE html>
<html lang="en">
    <head>

    </head>
    <body>
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span> </a>
                          <a href="index.php?menu=driver" class="brand"><div class="icon-large icon-truck">

                          </div>Deli Town</a>
            <div class="nav-collapse">
              <ul class="nav pull-right">
                <?php if ($_SESSION['is_logged']) { ?>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-large icon-user"></i> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="index.php?menu=driverEditProfile">Edit Profile</a></li>
                      <li><a href="index.php?menu=logout"> logout</a></li>
                   </ul>
                 </li>
              </ul>
              <?php } ?>

            </div>
            <!--/.nav-collapse -->
          </div>
          <!-- /container -->
        </div>
        <!-- /navbar-inner -->
      </div>
      <!-- /navbar -->

<div class="main"style="background-image:url('img/driver_background.jpg');background-size:100% ">
<div class="main-inner">
  <div class="container">
    <div class="row">
      <div class="widget" >
        <div class="widget-content" style="width: 74%">
          <br>
        <table class="table table-striped table-bordered">
            <th> id transaction <th> id user <th> address <th> status <th> total <th> aksi
                <?php while ($result->valid()) { ?>
                <tr>
                    <td> <?php echo $result->current()->getId_transac(); ?>
                    <td> <?php echo $result->current()->getId_user(); ?>
                    <td> <?php echo $result->current()->getAddress(); ?>
                    <td> <?php echo $result->current()->getStatus(); ?>
                    <td> <?php echo $result->current()->getTotal(); ?>
                    <td><a href="index.php?menu=driver&service=<?php echo $result->current()->getId_transac(); ?>"> pilih</a>
                </tr>
                <?php
                $result->next();
            }
            ?>
        </table>
        <br>
        on proses
        <table class="table table-striped table-bordered">
            <th> id transac <th> id user <th> address <th> status <th> total <th> aksi
                <?php while ($onproces->valid()) { ?>
                <tr>
                    <td> <?php echo $onproces->current()->getId_transac(); ?>
                    <td> <?php echo $onproces->current()->getId_user(); ?>
                    <td> <?php echo $onproces->current()->getAddress(); ?>
                    <td> <?php echo $onproces->current()->getStatus(); ?>
                    <td> <?php echo $onproces->current()->getTotal(); ?>
                    <td><a href="index.php?menu=driver&service=<?php echo $onproces->current()->getId_transac(); ?>"> pilih</a>
                </tr>
                <?php
                $onproces->next();
            }
            ?>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
    </body>
</html>
