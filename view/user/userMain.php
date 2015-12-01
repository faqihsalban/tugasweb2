
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
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> </a>
                    <a href="index.php?menu=user" class="brand"><div class="icon-large icon-truck">

                      </div>Deli Town</a>
                      <div class="nav-collapse">
                        <ul class="nav pull-right">

                          <!-- <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="icon-large icon-envelope"> <id class="counter" style="display:none">0</id>
                            </div><b class="caret"></b></a>

                            <ul class="dropdown-menu message-dropdown">



                                <li class="message-footer">
                                    <a href="../Notifikasi/notifikasi.php">Baca Seluruh Pesan</a>
                                </li>
                            </ul>
                          </li> -->

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



  <div class="main">
    <div class="main-inner">
      <div class="container">
        <div class="row">
         <div class="widget">
           <div class="widget-content">

               <h2 style="text-align: center;"><br>Selamat Datang di Deli Town
                 <div class="icon-large icon-truck" style="color:#52017b"></div>
                 <div class="icon-small icon-align-left"></div>
               </h2><br>
               <!-- food -->
              <div class="kotak1">
                  <div class="content clearfix" >
                      <form action="#" method="post">
                        <center>
                          <h2>FOOD</h2>

                          <a href="index.php?menu=deliFood"><img src="img/food_icon.png" class="foto" alt="" /></a>
                        </center>
                      </form>
                  </div>
                </div>


                <!-- laundry -->
                <div class="kotak2">
                    <div class="content clearfix" >
                        <form action="#" method="post">
                          <center>
                            <h2>LAUNDRY</h2>

                            <a href="index.php?menu=deliLaundry"><img src="img/laundry_icon.png" class="foto" style="background-size:50% 50%"/></a>
                          </center>
                        </form>
                    </div>
                  </div>


               <!-- photocopy -->
               <div class="kotak3">
                   <div class="content clearfix" >
                       <form action="#" method="post">
                         <center>
                           <h2>PHOTOCOPY</h2>

                           <a href="index.php?menu=deliCopy"><img src="img/pc_icon.png" class="foto" style="background-size:50% 50%"/></a>
                         </center>
                       </form>
                   </div>
                 </div>

            </div>
          </div>
        </div>
        </div>
        </div>
      </div>

     <?php


?>
</body>
</html>
