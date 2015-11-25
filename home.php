<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <title>Login - Peminjaman Ruangan BPSI</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
		<link href="css/font-awesome.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link href="css/pages/signin.css" rel="stylesheet" type="text/css">
		<!-- script dan css alertify -->
		<script src="alertify/alertify.min.js"></script>
		<link rel="stylesheet" href="alertify/css/alertify.min.css" />
		<link rel="stylesheet" href="alertify/css/themes/default.min.css" />
  </head>
  <body>
    <?php
    if ($_SESSION['is_logged']) {

        // echo "<a href='index.php?menu=logout'>Logout</a>";
        //disini harus bikin yang login jika role yang masuk ada lah user biasa, admin, pemilik dan driver
        //bikin html nya di pisah aja, nanti di include
        echo "<br>";
        // echo "Welcome " . $_SESSION['name'];
        $role = "";
        if ($_SESSION['role']==1) {
          $role = "Admin";
        }
        elseif ($_SESSION['role']==2) {
          $role = "User";

        }
        elseif ($_SESSION['role']==3) {
          $role = "Driver";
        }
        else {
          $role="Owner";
        }
        // echo " anda sebagai  " . $role;
        // 1 admin, 2 user 3 driver, 4 owner
        if ($_SESSION['role']==1) {
          header ('location:view/main.php');
        } else if ($_SESSION['role'] == 2) { //user
            //  include_once 'user/home.php';
        } else if ($_SESSION['role'] == 3) { //driver
            //  include_once 'driver/home.php';
        } else if ($_SESSION['role'] == 4) { //owner
            // include_once 'owner/home.php';
        }
    } else {
        ?>

        <!-- <div class="account-container">

            <div class="content clearfix">

                <form action="#" method="post">
                    <h1>Login</h1>

                    <div class="login-fields">

                        <p>Silahkan masukkan data login</p>

                        <div class="field">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" />
                        </div> <!-- /field -->

                        <!-- <div class="field">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
                        </div> <!-- /password -->

                    <!-- </div> <!-- /login-fields -->

                    <!-- <div class="login-actions">
                        <button class="button btn btn-success btn-large" type="submit" name="btn_login">Masuk</button>
                    </div> <!-- .actions -->

                <!-- </form> -->

            <!-- </div> <!-- /content -->

        <!-- </div> <!-- /account-container -->

        <!--    <form action="" method="POST">
                <table border="1">
                    <tr>
                        <td> Username
                        <td><input type="text" name="username"></tr>
                    <tr>
                        <td> Password
                        <td><input type="Password" name="password"></tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="login" name="btn_login"/>
                    </tr>
                </table>
            </form>-->
        <?php
    }
    ?>
  </body>
</html>
