<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>


              <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                  <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                                  class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a>
                                  <a class="brand"><div class="icon-large icon-truck">

                                  </div>Deli Town</a>
                                  <div class="nav-collapse">
                                    <ul class="nav pull-right">

                                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-large icon-user"></i> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="index.php?menu=userEditProfile">Edit Profile</a></li>
                                        <li><a href="index.php?menu=logout"> Logout</a></li>
                                     </ul>
                                   </li>
                                  </ul>

                    </div>
                    <!--/.nav-collapse -->
                  </div>
                  <!-- /container -->
                </div>
                <!-- /navbar-inner -->
              </div>
              <!-- /navbar -->
              <div class="subnavbar">
                <div class="subnavbar-inner">
                  <div class="container">
                    <ul class="mainnav">

                      <li class="dropdown"><a href="index.php?menu=deliFood" class="dropdown-toggle" >
                        <div class="icon-large icon-glass">
                        </div>
                        <span>FOOD DELI</span> <b class="caret"></b></a>
                      </li>

                      <li class="dropdown"><a href="index.php?menu=deliLaundry" class="dropdown-toggle" >
                        <div class="icon-large icon-tag">
                        </div>
                        <span>LAUNDRY DELI</span> <b class="caret"></b></a>

                      </li>

                      <li class="dropdown"><a href="index.php?menu=deliCopy" class="dropdown-toggle" >
                        <div class="icon-large icon-copy">
                        </div>
                        <span>PHOTOCOPY DELI</span> <b class="caret"></b></a>
                      </li>

                      <?php if ($_SESSION['is_logged']) { ?>
                    <li class="dropdown"><a href="index.php?menu=HistoryTransac" class="dropdown-toggle" >
                            <div class="icon-large icon-copy">
                            </div>
                            <span>History</span> <b class="caret"></b></a>
                    </li>
                    <?php } ?>

                    </ul>
                  </div>
                  <!-- /container -->
                </div>
                <!-- /subnavbar-inner -->
              </div>
              <!-- /subnavbar -->


<div class="main">
  <div class="main-inner">
    <div class="container">
      <center>
      <div class="rowSignup">
        <div class="widget-content">
        <form method="POST" enctype="multipart/form-data">
            <table class="table table-striped table-bordered" >
              <br>
              <tr>
                <td colspan="4"> <p style="font-size:170%; text-align: center" ><b>Edit User Profile</b></p></td>
              </tr>

                <tr>
                    <td>Nama</td>
                    <td><input type="text" class="inputNama" name="name" placeholder="Nama" value="<?php echo $user->getName(); ?>"/></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><?php echo $user->getUsername(); ?></td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td><input type="email" class="inputNama" name="email" placeholder="Email" value="<?php echo $user->getEmail(); ?>"/></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="number" class="inputNama" name="phone" placeholder="Phone" value="<?php echo $user->getPhone(); ?>"/></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" class="inputNama" name="password" placeholder="Password" value=""/></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" class="inputNama" name="confirmPassword" placeholder="Confirm Password" value=""/></td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" class="button btn btn-success btn-large" value="Update" name="btn_update"/>
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
        <?php
        // put your code here
        ?>
    </body>
</html>
