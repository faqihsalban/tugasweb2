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
                            <a href="index.php?menu=home" class="brand"><div class="icon-large icon-truck">

                            </div>Deli Town</a>
              <div class="nav-collapse">
                <ul class="nav pull-right">

        					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
        						<div class="icon-large icon-envelope"> <id class="counter" style="display:none">0</id>
        						</div><b class="caret"></b></a>

                    <ul class="dropdown-menu message-dropdown">



                        <li class="message-footer">
                            <a href="../Notifikasi/notifikasi.php">Baca Seluruh Pesan</a>
                        </li>
                    </ul>
                	</li>

        					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                     class="icon-large icon-user"></i> <b class="caret"></b></a>
         						<ul class="dropdown-menu">
         								<li><a href="../ganti_password.php">Ganti Password</a></li>
        								<li><a href="../Laporan/cetak_laporan.php">Cetak Laporan</a></li>
         	              <li><a href="logout.php">Keluar</a></li>
                     </ul>
                   </l
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

              </ul>
            </div>
            <!-- /container -->
          </div>
          <!-- /subnavbar-inner -->
        </div>
        <!-- /subnavbar -->




    <div class="main"style="background-image:url('img/food_background.jpg');background-size:100%;rotate:90">
    <div class="main-inner">
      <div class="container">
        <div class="row">
  				<div class="widget" >
  					<div class="widget-content" style="width: 74%">
  						<div class="faq-container">
  							<!-- <div class="faq-toc"> -->
  								<ol class="faq-list">

  								<h2 style="text-align: center;">FOOD DELI</h2><br>
                  <?php if (!$_SESSION['is_logged']) {?>

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
                            Kirimkan email ke: <a href="#">gofood@go-jek.com</a> dengan mencantumkan nama, nomor telepon,
                            nama restoran dan jenis masakan. Representatif dari FOOD DELI akan segera menghubungi kamu.<br><br>

                            <p style="text-align:center">Untuk melakukan pemesanan silakan <a href="index.php?menu=login">Login</a>
                              atau <a href="index.php?menu=signup">Daftar</a></p>
                              <?php } ?>

                            <?php
                                    // if ($_SESSION['is_logged']) {
                                        echo '<table class="table table-striped table-bordered" style="">';
                                        echo '<th> restaurant';
                                        echo '<th> action';
                                        while ($hasil->valid()) {

                                            echo "<tr>";
                                            echo "<td>" . $hasil->current()->getName();
                                            echo "<td>";
                                            ?>
                                            <a href="index.php?menu=deliFood&service=<?php echo $hasil->current()->getId_service(); ?>"> show menu</a>
                                            <?php
                                            echo "</tr>";
                                            $hasil->next();
                                        }
                                    // }
                                    ?>
                                </table>
                                <br>
                                        <?php if (isset($_GET['service'])) { ?>
                                    <table class="table table-striped table-bordered">
                                        <th>name <th> price  <th> action
                                            <?php
                                            while ($menu->valid()) {
                                                echo "<tr>";
                                                echo "<td>" . $menu->current()->getName();
                                                echo "<td>" . $menu->current()->getPrice();
                                                echo "<td>";
                                                ?>
                                                <input type = 'button' value='pilih' onclick="pilihmenu('<?php echo $menu->current()->getId_menu(); ?>')"/>
                                                <?php
                                                echo "</tr>";
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
