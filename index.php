<html>
    <head> 


        <script type='text/javascript' language='javascript'>
            function logout() {
                window.location(window.location.hostname+"/index.php?menu=logout");
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









if (!isset($_SESSION['is_logded'])) {
    $_SESSION['is_logded'] = FALSE;
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
    case 'book':
        $bookcon = new bookController();
        $bookcon->index();
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
    case 'logout':
        $usecon = new userController();
        $usecon->logout();
        break;
    default :
        $usecon = new userController();
        $usecon->index();
        break;
}
?>
