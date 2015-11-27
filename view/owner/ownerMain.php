
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
                      <a href="index.php?menu=ownerMain" class="brand"><div class="icon-large icon-truck">

                      </div>Deli Town</a>
        <div class="nav-collapse">
          <ul class="nav pull-right">
            <?php if ($_SESSION['is_logged']) { ?>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="icon-large icon-user"></i> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li><a href="index.php?menu=ownerEditProfile">Edit Profile</a></li>
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

  <div class="main">
    <div class="main-inner">
      <div class="container">
        <center>
        <div class="rowSignup">
          <div class="widget-content">
    <form method="POST" enctype="multipart/form-data">
        <table class="table table-striped table-bordered" >
          <br>
          <th style="text-align:center">
            Choose service here!
          </th>

          <tr>
            <td style="text-align:center">
              <select name="combo_service">
                <?php
                    while ($hasil -> valid()) {
                      echo "<option value='".$hasil -> current() -> getId_service()."'>".$hasil -> current() -> getName()."</option>";
                      $hasil->next();
                    }
                 ?>
              </select>
            </td>

          </tr>

        </table>
    </form>
  </div>

</div>
</center>
</div>
</div>
</div>

</body>
</html>
