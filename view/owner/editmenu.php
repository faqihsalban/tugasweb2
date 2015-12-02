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
                                  <a href="index.php?menu=owner" class="brand"><div class="icon-large icon-truck">

                                  </div>Deli Town</a>
                                  <div class="nav-collapse">
                                    <ul class="nav pull-right">

                                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-large icon-user"></i> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="index.php?menu=ownerEditProfile">Edit Profile</a></li>
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
                <td colspan="2"> <p style="font-size:170%; text-align: center" ><b>Edit Menu</b></p></td>
              </tr>

                <tr>
                    <td>Menu Name</td>
                    <td><input type="text" class="inputNama" name="menuName" value="<?php echo $menu->getName(); ?>"/></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="text" class="inputNama" name="menuPrice" value="<?php echo $menu->getPrice(); ?>"/></td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                      <!-- <input type="submit" class="button btn btn-success btn-large" style="margin-left:1em;" value="Hapus" name="btn_delete"/> -->
                      <!-- ini gimana sih cara supaya buttonnya misah, #pao tolong ya wakakaka -->
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

        <?php
        // $menu -<< untuk nampilin menu cara akses nya $menu->getId_menu(); dll
        ?>
