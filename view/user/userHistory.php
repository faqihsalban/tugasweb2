<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <title>Deli Food</title>

    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> </a>
                    <a href="index.php?menu=user" class="brand"><div class="icon-large icon-truck">

                        </div>Deli Town</a>
                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <?php if ($_SESSION['is_logged']) { ?>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-large icon-user"></i> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="index.php?menu=userEditProfile">Edit Profile</a></li>
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
        <div class="subnavbar">
            <div class="subnavbar-inner">
                <div class="container">
                    <ul class="mainnav">

                        <li class="active"><a href="index.php?menu=deliFood" class="dropdown-toggle" >
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
                        <li class="dropdown"><a href="index.php?menu=HistoryTransac" class="dropdown-toggle" >
                                <div class="icon-large icon-copy">
                                </div>
                                <span>History</span> <b class="caret"></b></a>
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
                    <center>
                        <div class="row">
                            <div class="widget-content">
                                
                                <br>
 TRANSAKSI YANG BELUM DI AMBIL
                                <table class="table table-striped table-bordered">
                                    <th> id transaction <th> address <th> status <th> total 
                                        <?php while ($transacNow->valid()) { ?>
                                        <tr>
                                            <td> <?php echo $transacNow->current()->getId_transac(); ?>
                                          
                                            <td> <?php echo $transacNow->current()->getAddress(); ?>
                                            <td> <?php echo $transacNow->current()->getStatus(); ?>
                                            <td> <?php echo $transacNow->current()->getTotal(); ?>
                        <!--                    <td><a href="index.php?menu=driver&service=<?php echo $transacNow->current()->getId_transac(); ?>"> pilih</a>-->
                                        </tr>
                                        <?php
                                        $transacNow->next();
                                    }
                                    ?>
                                </table>
                                <br>
                                ON PROCESS
                                <table class="table table-striped table-bordered">
                                    <th> id transaction  <th>id driver <th> address <th> status <th> total 
                                        <?php while ($transacOngoing->valid()) { ?>
                                        <tr>
                                            <td> <?php echo $transacOngoing->current()->getId_transac(); ?>
                                            
                                            <td> <?php echo $transacOngoing->current()->getId_driver(); ?>
                                            <td> <?php echo $transacOngoing->current()->getAddress(); ?>
                                            <td> <?php echo $transacOngoing->current()->getStatus(); ?>
                                            <td> <?php echo $transacOngoing->current()->getTotal(); ?>
                        <!--                    <td><a href="index.php?menu=driver&done=<?php echo $transacOngoing->current()->getId_transac(); ?>"> pilih</a>-->
                                        </tr>
                                        <?php
                                        $transacOngoing->next();
                                    }
                                    ?>
                                </table>
                                <br>
                                FINISH
                                <table class="table table-striped table-bordered">
                                    <th> id transaction  <th> id driver <th> address <th> status <th> total 
                                        <?php while ($transacDone->valid()) { ?>
                                        <tr>
                                            <td> <?php echo $transacDone->current()->getId_transac(); ?>
                                            
                                            <td> <?php echo $transacDone->current()->getId_driver(); ?>
                                            <td> <?php echo $transacDone->current()->getAddress(); ?>
                                            <td> <?php echo $transacDone->current()->getStatus(); ?>
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
                    </center>
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
