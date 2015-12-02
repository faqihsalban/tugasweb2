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
                                <table class="table table-striped table-bordered" style="">
                                    <br>
                                    <th> Menu <th> Harga <th> Jumlah Pembelian
                                    <?php 
                              $jadi=$menus->getIterator();
                              while($jadi->valid()){
                                   $formatHarga = number_format($jadi->current()->getPrice());
                                  echo "<tr>";
                                  echo "<td>".$jadi->current()->getName();
                                  echo "<td> Rp.".$formatHarga;
                                  echo "<td>".$jadi->current()->getQty();
                                  
                                  $jadi->next();
                              }
                           
                                      ?>
                                  
                                    
                                    
                                    
                                    
                                </table>
                              
                            </div>

                        </div>
                    </center>
                </div>
            </div>
        </div>

    </body>
</html>
