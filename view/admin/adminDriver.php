
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
                       <li class="active"><a href="index.php?menu=adminDriver" class="dropdown-toggle" >
                               <div class="icon-large icon-user">
                               </div>
                               <span>DRIVER</span> <b class="caret"></b></a>

                       </li>

                       <li class="dropdown"><a href="index.php?menu=adminTrans" class="dropdown-toggle" >
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
                    <center>
                        <div class="row">
                            <div class="widget-content">

                                <form action="" method="post">

                                    <?php
                                    echo "<table class='table table-striped table-bordered' style='width:80%'>";
                                    echo "<br>";
                                    echo "<th>ID</th>";
                                    echo "<th>User</th>";
                                    echo "<th>Username</th>";
                                    echo "<th>Email</th>";
                                    echo "<th>Phone</th>";
                                    echo "<th>Role</th>";
                                    echo "<th colspan ='2'>Join Date</th>";
                                    // echo "<th>Action</th>";


                                    while ($driver->valid()) {
                                    echo "<tr>";
                                    echo "<td>"; echo $driver->current()->getId_user();
                                    echo "<td>"; echo $driver->current()->getName();
                                    echo "<td>"; echo $driver->current()->getUsername();
                                    echo "<td>"; echo $driver->current()->getEmail();
                                    echo "<td>"; echo $driver->current()->getPhone();
                                    echo "<td>"; echo $driver->current()->getRole();
                                    echo "<td>"; echo $driver->current()->getDate_join();
                                    //ini harusnya rombol
                                    echo "<td>"; echo "<a href='index.php?menu=edit&id=".$driver->current()->getId_user()."'>
                                    <input type='button' class='button btn btn-success' value='Edit Profile'>
                                    </a></li>" ;


                                        $driver->next();
                                    }
                                    //data user disini ya faqih
                                    echo "</table>";
                                    ?>

                                </form>

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
