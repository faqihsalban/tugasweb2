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




        <div class="main"style="background-image:url('img/food_background3.jpg');background-size:100%;">
            <div class="main-inner">
                <div class="container">
                    <div class="row">
                        <div class="widget" >
                            <div class="widget-content" style="width: 74%">
                                <div class="faq-container">
                                    <!-- <div class="faq-toc"> -->
                                    <ol class="faq-list">

                                        <h2 style="text-align: center;">FOOD DELI</h2><br>
                                        <?php if (!$_SESSION['is_logged']) { ?>

                                            <div class="faq-text">
                                                <p style="font-size: 16px; margin-left:2em;">
                                                    Apa itu <b>FOOD DELI</b> dan bagaimana cara menggunakan layanannya?
                                                    FOOD DELI adalah salah satu fitur dalam aplikasi <b>DELI TOWN</b>.<br>
                                                    FOOD DELI memberikan pelanggan kemudahan dalam layanan pesan antar makanan.
                                                    Pada saat ini FOOD DELI hanya berada di kota Bandung.

                                                    <br><br>

                                                    Kami memiliki beberapa data restoran yang menu-nya dapat di akses via aplikasi DELI TOWN.
                                                    Klik fitur FOOD DELI untuk memilih kategori makanan dan jenis restaurant yang kamu inginkan.
                                                    <br><br>

                                                    Saat memilih dari menu, kamu dapat menggunakan fiture ‘add note’ untuk memperjelas pesanan kamu,
                                                    contoh: goreng kering, tidak pedas, tidak pakai bawang goreng dsb. Mohon diperhatikan bahwa harga yang
                                                    tercantum di DELI FOOD merupakan harga perkiraan dan pastikan kamu membayar sesuai tagihan.
                                                    Driver kami menalangi pembelian makanan sampai dengan Rp. 1.000.000 dengan syarat total makanan
                                                    yang dibeli masih dapat ditransportasikan dengan motor.
                                                    Biaya pembelian makanan dibayarkan cash.

                                                    <br><br>

                                                    Bagaimana cara mendaftarkan restoran ke FOOD DELI?
                                                    Kirimkan email ke: <a href="#">deliTown@gmail.com</a> dengan mencantumkan nama, nomor telepon,
                                                    nama restoran dan jenis masakan. Representatif dari FOOD DELI akan segera menghubungi kamu.<br><br>

                                                <p style="text-align:center">Untuk melakukan pemesanan silakan <a href="index.php?menu=login">Login</a>
                                                    atau <a href="index.php?menu=signup">Daftar</a></p>
                                            <?php } ?>

                                            <?php
                                            // if ($_SESSION['is_logged']) {
                                            echo '<table class="table table-striped table-bordered" style="">';
                                            echo '<th> restaurant';
                                            if ($_SESSION['is_logged']) {
                                                echo '<th> action';
                                            }
                                            while ($hasil->valid()) {

                                                echo "<tr>";
                                                echo "<td> "
                                                . $hasil->current()->getName();

                                                echo "</td>";
                                                if ($_SESSION['is_logged']) {
                                                    echo "<td>";
                                                    ?>
                                                    <a href="index.php?menu=deliFood&service=<?php echo $hasil->current()->getId_service(); ?>" name="show"> Show Menu</a>
                                                    <?php
                                                    echo "</td>";
                                                }
                                                echo "</tr>";
                                                $hasil->next();
                                            }
                                            // }
                                            ?>
                                            </table>
                                            <br>
                                            <?php if (isset($_GET['service'])) { ?>
                                                <?php if ($_SESSION['createTransac'] == FALSE) { ?>
                                                    <form method="POST" enctype="multipart/form-data">
                                                        <table>
                                                            <tr>
                                                                <td style="vertical-align: top">Address</td>
                                                                <td><textarea name="address" style="width: 25em;height: 5em;vertical-align: top"></textarea></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"> <input type="submit" class="button btn btn-success btn-large" style="margin-top: 1em" value="Create Transaction" name="btn_transac">
                                                            </tr>
                                                        </table>

                                                    </form>
                                                <?php } else { ?>

                                                    <table>
                                                        <th> item <th> Menu <th> Qty <th> Price
                                                            <?php while ($cart->valid()) { ?>
                                                            <form method="POST" enctype="multipart/form-data">
                                                                <tr>
                                                                    <td> <input type="hidden"  value="<?php echo $cart->current()->getId_item(); ?> " name="id_item" > 
                                                                    <td> <?php echo $cart->current()->getName_menu(); ?>
                                                                    <td> <?php echo $cart->current()->getQty(); ?>
                                                                    <td> <?php echo $cart->current()->getPrice(); ?>
                                                                    <td><input type="submit" class="button btn btn-danger btn-large" value="Hapus" name="btn_hapus">
                                                                </tr> 
                                                            </form>
                                                            <?php $cart->next();  }  ?>
                                                    </table>
                                                    <form method="POST" enctype="multipart/form-data">
                                                         <input type="submit" class="button btn btn-success btn-large" value="Check Oouutt" name="btn_checkout">
                                                        <input type="submit" class="button btn btn-success btn-large" value="Cancel" name="btn_cancel">
                                                    </form>
                                                <?php } ?>
                                                <table class="table table-striped table-bordered">
                                                    <th> <th>Name <th> Price  <th> Quantity   <?php if($_SESSION['createTransac']){?> <th> Action <?php } ?>
                                                        <?php while ($menu->valid()) { ?>
                                                        <form method="POST" enctype="multipart/form-data">
                                                            <tr>
                                                                <td> <input type="hidden"  value="<?php echo $menu->current()->getId_menu(); ?>" name="id_menu" >
                                                                <td> <?php echo $menu->current()->getName(); ?>
                                                                <td> <?php echo $menu->current()->getPrice(); ?>
                                                                <td><input class="inputQuantity" type="text" name="qty">
                                                                    <?php if($_SESSION['createTransac']){?>
                                                                    <td><input type="submit" class="button btn btn-success btn-large" value="Pesan" name="btn_pesan"><?php } ?>
                                                            </tr>
                                                        </form>
                                                        <?php
                                                        $menu->next();
                                                    }
                                                    ?>
                                                </table>
                                            <?php } ?>
                                            </p>


                                        </div>

                                    </ol>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
// }
        ?>
    </body>
</html>
<script type="text/javascript">
    function showTextField(el) {
        if (el.selectedIndex) {
            switch (el.selectedIndex) {
                case 1:
                    document.forms[0].elements['btn_show'].style.display = "";
                    break;
            }
        }
    }
</script>
