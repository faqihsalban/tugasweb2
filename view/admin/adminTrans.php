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
                    <a href="index.php?menu=admin" class="brand"><div class="icon-large icon-truck">

                        </div>Deli Town</a>
                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <?php if ($_SESSION['is_logged']) { ?>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-large icon-user"></i> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="index.php?menu=adminEditProfile">Edit Profile</a></li>
                                        <li><a href="index.php?menu=logout">Logout</a></li>
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


        <div class="subnavbar">
            <div class="subnavbar-inner">
                <div class="container">
                    <ul class="mainnav">

                      <li class="dropdown"><a href="index.php?menu=adminUser" class="dropdown-toggle" >
                              <div class="icon-large icon-group">
                              </div>
                              <span>USER</span> <b class="caret"></b></a>
                      </li>

                      <li class="dropdown"><a href="index.php?menu=adminTenant" class="dropdown-toggle" >
                              <div class="icon-large icon-flag">
                              </div>
                              <span>TENANT</span> <b class="caret"></b></a>

                      </li>
                      <li class="dropdown"><a href="index.php?menu=adminDriver" class="dropdown-toggle" >
                              <div class="icon-large icon-user">
                              </div>
                              <span>DRIVER</span> <b class="caret"></b></a>

                      </li>

                      <li class="active"><a href="index.php?menu=adminTrans" class="dropdown-toggle" >
                              <div class="icon-large icon-credit-card">
                              </div>
                              <span>TRANSACTION</span> <b class="caret"></b></a>
                      </li>

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
                    <!-- <center> -->
                        <div class="row">
                            <div class="widget-content">

                                <br>
                                <h3>Daftar Permintaan Transaksi</h3>
                                <table class="table table-striped table-bordered">
                                    <th> Transaction ID <th> User  <th> Address <th> Status <th> Total
                                        <?php while ($transacNow->valid()) { ?>
                                        <tr>
                                            <td> <?php echo $transacNow->current()->getId_transac(); ?>
                                            <td> <?php echo $transacNow->current()->getName_user(); ?>
                                            <td> <?php echo $transacNow->current()->getAddress(); ?>
                                            <td> <?php if($transacNow->current()->getStatus()==0) echo 'Belum Diambil'; 	
                                            else if  ($transacNow->current()->getStatus()==1) echo 'Sedang Diantar'; 
                                            else echo 'Selesai'; ?>
                                            <td> <?php echo $transacNow->current()->getTotal(); ?>
                        <!--                    <td><a href="index.php?menu=driver&service=<?php echo $transacNow->current()->getId_transac(); ?>"> pilih</a>-->
                                        </tr>
                                        <?php
                                        $transacNow->next();
                                    }
                                    ?>
                                </table>
                                <br>
                                <h3>Transaksi Dalam Proses</h3>

                                <table class="table table-striped table-bordered">
                                    <th> Transaction ID <th> User  <th> Driver  <th> Address <th> Status <th> Total
                                        <?php while ($transacOngoing->valid()) { ?>
                                        <tr>
                                            <td> <?php echo $transacOngoing->current()->getId_transac(); ?>
                                            <td> <?php echo $transacOngoing->current()->getName_user(); ?>
                                            <td> <?php echo $transacOngoing->current()->getName_driver(); ?>
                                            <td> <?php echo $transacOngoing->current()->getAddress(); ?>
                                             <td> <?php if($transacOngoing->current()->getStatus()==0) echo 'Belum Diambil'; 	
                                            else if  ($transacOngoing->current()->getStatus()==1) echo 'Sedang Diantar'; 
                                            else echo 'Selesai'; ?>
                                            <td> <?php echo $transacOngoing->current()->getTotal(); ?>
                        <!--                    <td><a href="index.php?menu=driver&done=<?php echo $transacOngoing->current()->getId_transac(); ?>"> pilih</a>-->
                                        </tr>
                                        <?php
                                        $transacOngoing->next();
                                    }
                                    ?>
                                </table>
                                <br>
                                  <h3>Transaksi Yang Sudah Selesai</h3>
                                <table class="table table-striped table-bordered">
                                    <th> Transaction ID <th> User  <th> Driver  <th> Address <th> Status <th> Total
                                        <?php while ($transacDone->valid()) { ?>
                                        <tr>
                                            <td> <?php echo $transacDone->current()->getId_transac(); ?>
                                            <td> <?php echo $transacDone->current()->getName_user(); ?>
                                            <td> <?php echo $transacDone->current()->getName_driver(); ?>
                                            <td> <?php echo $transacDone->current()->getAddress(); ?>
                                             <td> <?php if($transacDone->current()->getStatus()==0) echo 'Belum Diambil'; 	
                                            else if  ($transacDone->current()->getStatus()==1) echo 'Sedang Diantar'; 
                                            else echo 'Selesai'; ?>
                                            <td> <?php echo $transacDone->current()->getTotal(); ?>
                                            <!-- <td><a href="index.php?menu=driver&service=<?php echo $transacDone->current()->getId_transac(); ?>"> pilih</a>-->
                                        </tr>
                                        <?php
                                        $transacDone->next();
                                    }
                                    ?>
                                </table>
                            </div>

                        </div>
                    <!-- </center> -->
                </div>
            </div>
        </div>
        <?php
//intinya dia cuma ganti role user aja sih
//$alluser  ini list semua user yang ada
//    $user  ini list user yang status nya user biasa
//     $driver ini list user yang status nya jadi driver
//    $owner ini list user yang jadi owner
// tombol aksi nya pake yang edit profile aja,
        ?>
    </body>
</html>