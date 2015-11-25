<html>
    <head>
      <!DOCTYPE html>
      <html lang="en">
      <head>
      <!-- include css -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
      <link href="css/sb-admin.css" rel="stylesheet">
      <link href="css/font-awesome.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href="css/pages/dashboard.css" rel="stylesheet">
      <link href="css/pages/faq.css" rel="stylesheet">

      <!-- script dan css alertify -->
      <script src="alertify/alertify.min.js"></script>
      <link rel="stylesheet" href="alertify/css/alertify.min.css" />
      <link rel="stylesheet" href="alertify/css/themes/default.min.css" />

      <!-- include javascript -->
      <script src="js/jquery-1.7.2.min.js"></script>
      <script src="js/excanvas.min.js"></script>
      <script src="js/chart.min.js" type="text/javascript"></script>
      <script src="js/bootstrap.js"></script>
      <script language="javascript" type="text/javascript" src="js/full-calendar/fullcalendar.min.js"></script>
      <script src="js/base.js"></script>
      <script src="js/jquery-ui.js"></script>



        <script type='text/javascript' language='javascript'>
            function logout() {
                // window.location(window.location.hostname+"/index.php?menu=logout");
            }


        </script>
    </head>

</html>

<?php
session_start();
include_once 'conection.php';
include_once 'model/item.php';
include_once 'model/itemInterface.php';
include_once 'model/itemDao.php';

include_once 'model/menu.php';
include_once 'model/menuInterface.php';
include_once 'model/menuDao.php';

include_once 'model/service.php';
include_once 'model/serviceInterface.php';
include_once 'model/serviceDao.php';

include_once 'model/transac.php';
include_once 'model/transacInterface.php';
include_once 'model/transacDao.php';

include_once 'model/user.php';
include_once 'model/userInterface.php';
include_once 'model/userDao.php';

include_once 'controller/itemController.php';
include_once 'controller/menuController.php';
include_once 'controller/serviceController.php';
include_once 'controller/transacController.php';
include_once 'controller/userController.php';

//include_once 'view/main.php';
//include_once 'view/deliFood.php';



if (!isset($_SESSION['is_logged'])) {
    $_SESSION['is_logged'] = FALSE;
}
if (isset($_GET['menu'])) {
    $mnu = $_GET['menu'];
} else {
    $mnu = "";
}

switch ($mnu) {
    // menu nya jadi, kalo seorang user login maka dia akan ditampilkan halaman milih service terus bikin transaksi service itu
    // dan ada dropdown profile, ada 2 ini yaitu history, dia bisa liat history transaksi. dan profile, bisa update profile
    //kalo driver yang login, maka dia akan ditampilkan tabel transaksi yang status nya masih 0, alias belum ada driver nya
    case 'home':
        $usecon = new userController();
        $usecon->index();
        break;
    case 'deliFood':
        // $bookcon = new bookController();
        // $bookcon->index();
        include_once("view/deliFood.php");
        break;
    case 'cate':
        $katecon = new kategoriController();
        $katecon->index();
        break;
    case 'updatecate':
        include("fupdcat.php");
        break;
    case 'updatebook':
        include("fupdbook.php");
        break;
    case 'logout':include_once ("logout.php");
        // $usecon = new userController();
        // $usecon->logout();
        // break;
    default :
        $usecon = new userController();
        $usecon->index();
        break;
}
?>
