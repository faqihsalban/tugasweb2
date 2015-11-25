<?php
// 	session_start();
// 	ob_start();
// 	require '../../Connection.php';
// 	$unit = $_SESSION['setNamaUnit'];
//   if(isset($_GET['idRuangan'])){
//     $idRuangan = $_GET['idRuangan'];
//   } else {
//
//     $sql = "
//             SELECT idRuangan FROM tbweb_Ruangan WHERE idGedung=1";
//     $rs = odbc_exec($conn, $sql);
//     while (odbc_fetch_row($rs)) {
//       $idRuangan = odbc_result($rs, 'idRuangan');
//       break;
//   }
//
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>

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
						<div class="icon-large icon-envelope"> <id class="counter" style="display:none">0</id>
						</div><b class="caret"></b></a>

            <ul class="dropdown-menu message-dropdown">

							<?php
							// require_once '../../show_Notif.php';

							//menentukan index akhir for
							// if (count($arrayNotifications)>=3) { //jika pjang array >= 3 maka yg ditampilkan hanya 3 notif terbaru saja
								// $indexAkhir = count($arrayNotifications)-3;
							// } else { // jika pjang array < 3 maka tampilkan semua
								// $indexAkhir = 0;
							// }

							// for ($index=count($arrayNotifications)-1; $index >= $indexAkhir; $index--) {
								//kasih icon bullhorn jika notif itu baru
								// if ($arrayNotifications[$index][9]==0) {
								// 	$icon = 'icon-bullhorn';
								// } else {
								// 	$icon='';
								// }

							// 	echo "
							// 	<li class='message-preview'>
							// 			<a href='../update_form.php?id={$arrayNotifications[$index][10]}'>
							// 					<div class='media'>
							// 							<div class='media-body'>
							// 								<h5 class='media-heading'>
							// 								<strong>{$arrayNotifications[$index][0]} ({$arrayNotifications[$index][1]})  <i class='{$icon}'></i></strong>
							// 								</h5>
							// 								<p class='small text-muted'><i class='icon-small icon-time'></i>  {$arrayNotifications[$index][2]}</p>
							// 								<p>Request jadwal ruangan {$arrayNotifications[$index][5]}</p>
							// 							</div>
							// 					</div>
							// 			</a>
							// 	</li>";
              //
							// }
							?>

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

        <li class="dropdown"><a href="index.php?menu=deliFood" class="dropdown-toggle" >
          <div class="icon-large icon-glass">
          </div>
          <span>FOOD DELI</span> <b class="caret"></b></a>
        </li>

        <li class="active"><a href="gap.php" class="dropdown-toggle" >
          <div class="icon-large icon-tag">
          </div>
          <span>LAUNDRY DELI</span> <b class="caret"></b></a>

        </li>

        <li class="dropdown"><a href="../GWM/gwm.php" class="dropdown-toggle" >
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




<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
				<div class="widget">
					<div class="widget-content">
						<div class="faq-container">
							<!-- <div class="faq-toc"> -->

								<h2 style="text-align: center;"><br>Selamat Datang di Deli Town
                  <div class="icon-large icon-truck" style="color:#52017b"></div>
                  <div class="icon-small icon-align-left"></div>
                </h2>
                <p style="text-align:center">Silahkan Login atau <a href="#">Daftar</a></p>

                <div class="account-container" style="margin-top:1em; margin-bottom:3em">

                    <div class="content clearfix" >
                        <form action="" method="post">
                            <h1>Login</h1>

                            <div class="login-fields">

                                <div class="field">
                                    <label for="username">Username</label>
                                    <input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" />
                                </div> <!-- /field -->

                              <div class="field">
                                    <label for="password">Password:</label>
                                    <input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
                                </div> <!-- /password -->

                            </div>

                            <div class="login-actions">
                                <button class="button btn btn-success btn-large" type="submit" name="btn_login">Masuk</button>
                            </div>

                        </form>

                    </div>
                  </div>
							</div>
						</div>
					</div>
				</div>
				</div>
				</div>
			</div>
		</div>
		</div>



<!-- <div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2015 Peminjaman Ruangan by Silviana & Claudia. All Rights Reserved. Powered by BPSI </div>
        <!-- /span12 -->
      <!-- </div> -->
      <!-- /row -->
    <!-- </div> -->
    <!-- /container -->
  <!-- </div> -->
  <!-- /footer-inner -->
<!-- </div> -->
<!-- /footer -->
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- bagin -->



</body>
</html>
