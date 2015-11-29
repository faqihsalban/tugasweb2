
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
                      <a href="index.php?menu=owner" class="brand"><div class="icon-large icon-truck">

                      </div>Deli Town</a>
        <div class="nav-collapse">
          <ul class="nav pull-right">
            <?php if ($_SESSION['is_logged']) { ?>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="icon-large icon-user"></i> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li><a href="index.php?menu=ownerEditProfile">Edit Profile</a></li>
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

  <div class="main">
    <div class="main-inner">
      <div class="container">
        <center>
        <div class="rowSignup">
          <div class="widget-content">


              <?php
                                    // if ($_SESSION['is_logged']) {
                                        echo '<table class="table table-striped table-bordered" style="">';
                                        echo "<br>";
                                        echo '<th colspan="2" style="text-align:center"> restaurant';
                                        // echo '<th> action';
                                        while ($services->valid()) {

                                            echo "<tr>";
                                                echo "<td>". $services->current()->getName(); echo "</td>";
                                                echo "<td>";
                                                ?>
                                                <center><a href="index.php?menu=owner&service=<?php echo $services->current()->getId_service(); ?>" name="show">
                                                <!-- #pao itu kelas btn info warnanya gak asik, ntar ganti aja jadi kuning atau apa deh yg cocok -->
                                                <input type='button' class='btn btn-info' value='Show Menu'>
                                              </a></center>
                                                <?php
                                                echo "</td>";
                                            echo "</tr>";
                                            $services->next();
                                        }
                                    // }
                                    ?>
                                </table>
                                <br>
                                        <?php if (isset($_GET['service'])) { ?>
                                    <table class="table table-striped table-bordered">
                                        <th>Name <th colspan="2"> Price
                                            <?php
                                            while ($menu->valid()) {
                                                echo "<tr>";
                                                  echo "<td>" . $menu->current()->getName();
                                                  echo "<td>" . $menu->current()->getPrice();
                                                  echo "<td>";
                                                  ?>
                                            <a href="index.php?menu=editMenu&id=<?php echo $menu->current()->getId_menu(); ?>" name="show">
                                            <input type='button' class='btn btn-info' value='Edit Menu'> </a>
                                                <?php
                                                echo "</tr>";
                                                $menu->next();
                                            }
                                            ?>

                                    </table>

                            <?php } ?>


  </div>

</div>
</center>
</div>
</div>
</div>

</body>
</html>
