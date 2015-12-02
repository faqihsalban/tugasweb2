
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
                      <li><a href="index.php?menu=logout"> Logout</a></li>
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
          <h3> Detail Transaksi</h3>
          
          <table class="table table-striped table-bordered">
              <tr>
                    <td> <?php echo $transac->getName_user(); ?>
                    <td> <?php echo $transac->getAddress();  ?>
                    <td> <?php echo $transac->getTotal(); ?>
                    
                </tr>
          </table>
          
          
        <table class="table table-striped table-bordered">
            <th> Menu <th> Quantity <th> Price 
                <?php  while ($items->valid()) { ?>
                <tr>
                    <td> <?php echo $items->current()->getName_menu(); ?>
                    <td> <?php echo $items->current()->getQty(); ?>
                    <td> <?php echo $items->current()->getPrice(); ?>
                    
                </tr>
                <?php
                $items->next();
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
