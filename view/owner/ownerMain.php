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
                                <br>
                                <h3> Your Tenant List & Info </h3>
                                <table class="table table-striped table-bordered" style="">
                                    <br>
                                    <th> Service <th> <a href="index.php?menu=addService"><input type='button' class='button btn btn-success' value='Add Service'></a>
                                        <?php while ($services->valid()) { ?>
                                        <tr>
                                            <td><?php echo $services->current()->getName(); ?></td>
                                            <td><a href="index.php?menu=report&service=<?php echo $services->current()->getId_service(); ?>" name="show">
                                                    <input type='button' class='button btn btn-success'  value='Report'></a>
                                                <a href="index.php?menu=owner&service=<?php echo $services->current()->getId_service(); ?>" name="show">
                                                    <input type='button' class='button btn btn-success' style="margin-right: 1em" value='Show Menu'></a>
                                                <?php
                                                $services->next();
                                            }
                                            ?>
                                </table>
                                <br>
                                <?php if (isset($_GET['service'])) { ?>
                                    <h2>  <?php echo $service->getName(); ?> </h2>
                                    <table class="table table-striped table-bordered">
                                        <th>Name <th> Price <th> <a href="index.php?menu=addMenu&service=<?php echo $_GET['service'] ?>"><input type='button' class='button btn btn-success' value='Add Menu'></a>
                                            <?php
                                            while ($menu->valid()) {
                                                $formatHarga = number_format($menu->current()->getPrice());

                                                echo "<tr>";
                                                echo "<td>" . $menu->current()->getName();
                                                echo "<td> Rp." . $formatHarga;
                                                echo "<td>";
                                                ?>
                                                <a href="index.php?menu=editMenu&id=<?php echo $menu->current()->getId_menu(); ?>" name="show">
                                                    <input type='button' class='button btn btn-success' value='Edit Menu'> </a>
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
