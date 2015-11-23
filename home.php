<?php
if ($_SESSION['is_logded']) {

    echo "<a href='index.php?menu=logout'>Logout</a>";
    //disini harus bikin yang login jika role yang masuk ada lah user biasa, admin, pemilik dan driver
    //bikin html nya di pisah aja, nanti di include
    echo "<br>";
    echo "welvome " . $_SESSION['name'];
    echo " anda sebagai  " . $_SESSION['role'];
    // 1 admin, 2 user 3 driver, 4 owner
    if ($_SESSION['role'] == 1) { //admin
       // include_once 'admin/home.php';
    } else if ($_SESSION['role'] == 2) { //user
      //  include_once 'user/home.php';
    } else if ($_SESSION['role'] == 3) { //driver
      //  include_once 'driver/home.php';
    } else if ($_SESSION['role'] == 4) { //owner
       // include_once 'owner/home.php';
    }
} else {
    ?>
    <form action="" method="POST">
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
    </form>
    <?php
}
?>
