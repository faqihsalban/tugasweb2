<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userController
 *
 * @author faqih
 */
class userController {

    private $userdao;
    private $transacdao;
    private $servicedao;
    private $menudao;
    private $itemdao;

    public function __construct() {
        $this->userdao = new userDao();
        $this->transacdao = new transacDao();
        $this->servicedao = new serviceDao();
        $this->menudao = new menuDao();
        $this->itemdao = new itemDao();
    }

    public function index() {
        if (isset($_POST['btn_login'])) {
            $username = trim($_POST['username']);
            $password = md5(trim($_POST['password']));

            if (empty($username) || empty($password)) {
                echo "<script>alertify.error('Username dan Password kosong');</script>";

                // echo "Username dan Password kosong";
                require_once './login.php';
            } else {
                $usr = new user();
                $usr->setUsername($username);
                $usr->setPassword($password);
                $login_result = $this->userdao->login($usr);
                if ($login_result) {
                    echo "<script>alertify.success('sukses');</script>";
                    $_SESSION['createTransac'] = FALSE;
                    if ($_SESSION['role'] == 1)
                        header("location: index.php?menu=admin");
                    else if ($_SESSION['role'] == 2)
                        header("location: index.php?menu=user");
                    else if ($_SESSION['role'] == 3)
                        header("location: index.php?menu=driver");
                    else if ($_SESSION['role'] == 4)
                        header("location: index.php?menu=owner");
                } else {
                    //  echo "Username dan Password tidak ditemukan";

                    echo "<script>alertify.error('Username dan Password salah');</script>";
                    require_once './login.php';
                }
            }
        } else
            require_once './home.php';
    }

    public function user() {

        require_once 'view/user/userMain.php';
    }

    public function login() {
        require_once 'login.php';
    }

    public function userHistory() {
        $transacNow = $this->transacdao->get_transac_by_user_status($_SESSION['id_user'], 0)->getIterator();
        $transacOngoing = $this->transacdao->get_transac_by_user_status($_SESSION['id_user'], 1)->getIterator();
        $transacDone = $this->transacdao->get_transac_by_user_status($_SESSION['id_user'], 2)->getIterator();
        require_once 'view/user/userHistory.php';
    }

    public function signup() {
        if (isset($_POST['signUp'])) {
            $email = $_POST['email'];
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            $phone = $_POST['phone'];

            $user = new User();
            $user->setEmail($email);
            $user->setName($nama);
            $user->setUsername($username);
            $user->setPassword(md5($password));
            $user->setRole(2);
            $user->setPhone($phone);
            $this->userdao->add($user);
            // $this->$userdao->add($user);

            echo "<script>
                    alertify.success('ID User berhasil didaftarkan');
                    </script>";
        }
        $dataUser = $this->userdao->get_all_user()->getIterator();
        require_once 'signup.php';
    }

    public function driver() {
        if (isset($_GET['service'])) {
            $vtransac = new transac();
            $vtransac->setId_transac($_GET['service']);
            $vtransac->setStatus(1);
            $vtransac->setId_driver($_SESSION['id_user']);

            $pesan = $this->transacdao->upd_status($vtransac);
            $pesan = $this->transacdao->upd_driver($vtransac);
        }
        if (isset($_GET['done'])) {
            $vtransac = new transac();
            $vtransac->setId_transac($_GET['done']);
            $vtransac->setStatus(2);


            $pesan = $this->transacdao->upd_status($vtransac);
        }

        $result = $this->transacdao->get_transac_by_status(0)->getIterator();
        $onproces = $this->transacdao->get_transac_by_driver_status($_SESSION['id_user'], 1)->getIterator();
        $complete = $this->transacdao->get_transac_by_driver_status($_SESSION['id_user'], 2)->getIterator();

        require_once 'view/driver/driverMain.php';
    }

    public function admin() {
        $dirisendiri = $this->userdao->get_user_by_id($_SESSION['id_user']);
        $alluser = $this->userdao->get_all_user()->getIterator();

        require_once 'view/admin/adminMain.php';
    }

    public function editMenu() {

        $id_menu = $_GET['id'];
        if (isset($_POST['btn_delete'])) {
            $vmenu = new menu();
            $vmenu->setId_menu($id_menu);
            //ini nya ga jalan alert nya
            echo "<script>
                    alertify.confirm('Apakah anda yakin ingin menghapus menu?','ya','Default Value');
                    </script>";
            $this->menudao->del($vmenu);
            header("location: index.php?menu=owner");
        }

        if (isset($_POST['btn_update'])) {
            $vmenu = new menu();
            $vmenu->setId_menu($id_menu);
            $vmenu->setName($_POST['menuName']);
            $vmenu->setPrice($_POST['menuPrice']);
            //ini nya ga jalan alert nya
            echo "<script>
            alertify.confirm('Apakah anda yakin ingin mengupdate menu?','ya','Default Value')
            </script>";
            $this->menudao->upd($vmenu);
            header("location: index.php?menu=owner");
        }


        $menu = $this->menudao->get_menu_by_id($id_menu);

        require_once 'view/owner/editmenu.php';
    }

    public function addMenu() {

        $id_service = $_GET['service'];
        if (isset($_POST['btn_add'])) {
            $vmenu = new menu();
            $vmenu->setId_service($id_service);
            $vmenu->setName($_POST['menuName']);
            $vmenu->setPrice($_POST['menuPrice']);
            //ini nya ga jalan alert nya
            echo "<script>
            alertify.success('Menu berhasil ditambahkan');
            </script>";

            $this->menudao->add($vmenu);
            header("location: index.php?menu=owner&service=$id_service");
        }
        require_once 'view/owner/addMenu.php';
    }

    public function addService() {


        if (isset($_POST['btn_add'])) {
            $vservice = new service();
            $vservice->setId_user($_SESSION['id_user']);
            $vservice->setName($_POST['serviceName']);
            $vservice->setPhone($_POST['servicePhone']);
            $vservice->setType($_POST['serviceType']);
            $vservice->setAddress($_POST['serviceAddress']);
            //ini nya ga jalan alert nya
            echo "<script>
                      alertify.confirm('Apakah anda yakin ingin add  service?','ya','Default Value');
                  </script>";

            $this->servicedao->add($vservice);
            header("location: index.php?menu=owner");
        }
        require_once 'view/owner/addService.php';
    }

    public function owner() {

        $services = $this->servicedao->get_service_by_user($_SESSION['id_user'])->getIterator();

        if (isset($_GET['service'])) {
            $service = $this->servicedao->get_service_by_id($_GET['service']);
            $id_service = $_GET['service'];
            $menu = $this->menudao->get_menu_by_service($id_service)->getIterator();
        }
        require_once 'view/owner/ownerMain.php';
    }

    public function editProfile() {
        $user = $this->userdao->get_user_by_id($_SESSION['id_user']);
        if (isset($_POST['btn_update'])) {
            $userbaru = new user();
            $userbaru->setName($_POST['name']);
            $userbaru->setPassword(md5($_POST['password']));
            $userbaru->setEmail($_POST['email']);
            $userbaru->setPhone($_POST['phone']);
            $userbaru->setRole($_POST['role']);
            $userbaru->setId_user($_SESSION['id_user']);

            if ($this->userdao->adminupd($userbaru))
                echo "<script>
                    alertify.success('berhasil ');
                    </script>";
            header("location: index.php?menu=user");
        }
        require_once 'view/editProfile.php';
    }

    public function userEditProfile() {
        $user = $this->userdao->get_user_by_id($_SESSION['id_user']);

        if (isset($_POST['btn_update'])) {
            $confirmPassword = $_POST['confirmPassword'];
            $password = $_POST['password'];
            $userbaru = new user();
            $userbaru->setName($_POST['name']);
            $userbaru->setPassword(md5($_POST['password']));
            $userbaru->setEmail($_POST['email']);
            $userbaru->setPhone($_POST['phone']);
            $userbaru->setId_user($_SESSION['id_user']);

            if ($password != $confirmPassword) {

                echo "
                    <script>
                    alertify.alert('Password Tidak Sesuai Konfirmasi');
                    </script>
                   ";
            } else {
                // echo "alalalala";
                $this->userdao->upd($userbaru);
                header("location:index.php?menu=userMain");
            }
        }
        require_once 'view/user/userEditProfile.php';
    }

    public function Edit() {
        $user = $this->userdao->get_user_by_id($_GET['id']);

        if (isset($_POST['btn_update'])) {
            $userbaru = new user();
            $userbaru->setName($_POST['name']);
            $userbaru->setEmail($_POST['email']);
            $userbaru->setPhone($_POST['phone']);
            $userbaru->setRole($_POST['role']);
            $userbaru->setId_user($_GET['id']);

            $this->userdao->adminupd($userbaru);
            // header("location:index.php?menu=admin");
        }

        require_once 'view/editprofile.php';
    }

    public function ownerEditProfile() {
        $user = $this->userdao->get_user_by_id($_SESSION['id_user']);

        if (isset($_POST['btn_update'])) {
            $confirmPassword = $_POST['confirmPassword'];
            $password = $_POST['password'];
            $userbaru = new user();
            $userbaru->setName($_POST['name']);
            $userbaru->setPassword(md5($_POST['password']));
            $userbaru->setEmail($_POST['email']);
            $userbaru->setPhone($_POST['phone']);
            $userbaru->setId_user($_SESSION['id_user']);

            if ($password != $confirmPassword) {

                echo "
                    <script>
                    alertify.alert('Password Tidak Sesuai Konfirmasi');
                    </script>
                   ";
            } else {
                // echo "alalalala";
                $this->userdao->upd($userbaru);
                header("location:index.php?menu=owner");
            }
        }
        require_once 'view/owner/ownerEditProfile.php';
    }

    public function driverEditProfile() {
        $user = $this->userdao->get_user_by_id($_SESSION['id_user']);

        if (isset($_POST['btn_update'])) {
            $confirmPassword = $_POST['confirmPassword'];
            $password = $_POST['password'];
            $userbaru = new user();
            $userbaru->setName($_POST['name']);
            $userbaru->setPassword(md5($_POST['password']));
            $userbaru->setEmail($_POST['email']);
            $userbaru->setPhone($_POST['phone']);
            $userbaru->setId_user($_SESSION['id_user']);

            if ($password != $confirmPassword) {

                echo "
                    <script>
                    alertify.alert('Password Tidak Sesuai Konfirmasi');
                    </script>
                   ";
            } else {
                // echo "alalalala";
                $this->userdao->upd($userbaru);
                header("location:index.php?menu=driverMain");
            }
        }
        require_once 'view/driver/driverEditProfile.php';
    }

    public function adminEditProfile() {
        $user = $this->userdao->get_user_by_id($_SESSION['id_user']);

        if (isset($_POST['btn_update'])) {
            $confirmPassword = $_POST['confirmPassword'];
            $password = $_POST['password'];
            $userbaru = new user();
            $userbaru->setName($_POST['name']);
            $userbaru->setPassword(md5($_POST['password']));
            $userbaru->setEmail($_POST['email']);
            $userbaru->setPhone($_POST['phone']);
            $userbaru->setId_user($_SESSION['id_user']);

            if ($password != $confirmPassword) {

                echo "
                    <script>
                    alertify.alert('Password Tidak Sesuai Konfirmasi');
                    </script>
                   ";
            } else {
                // echo "alalalala";
                $this->userdao->upd($userbaru);
                header("location:index.php?menu=adminMain");
            }
        }
        require_once 'view/admin/adminEditProfile.php';
    }

    public function adminUser() {
        $user = $this->userdao->get_user_by_role(2)->getIterator();
        require_once 'view/admin/adminUser.php';
    }

    public function adminTenant() {

        $owner = $this->userdao->get_user_by_role(4)->getIterator();
        require_once 'view/admin/adminTenant.php';
    }

    public function adminTrans() {
        $transacNow = $this->transacdao->get_transac_by_status(0)->getIterator();
        $transacOngoing = $this->transacdao->get_transac_by_status(1)->getIterator();
        $transacDone = $this->transacdao->get_transac_by_status(2)->getIterator();
        require_once 'view/admin/adminTrans.php';
    }

    public function adminDriver() {
        $driver = $this->userdao->get_user_by_role(3)->getIterator();
        require_once 'view/admin/adminDriver.php';
    }

    public function detailTrans() {
        $items = $this->itemdao->get_item_by_transac($_GET['id'])->getIterator();
        $transac = $this->transacdao->get_transac_by_id($_GET['id']);

        require_once 'view/driver/detail.php';
    }

    public function report() {
        $menu = $this->menudao->get_menu_by_service($_GET['service'])->getIterator();
        $var = new ArrayIterator();

        $menus = new ArrayObject();
        while ($menu->valid()) {
            
            
            $item = $this->itemdao->get_report_menu($menu->current()->getId_menu());
            
            $aaa = new reportmenu();
            $aaa->setName($menu->current()->getName());
            $aaa->setQty($item['sum(qty)']);
            $aaa->setPrice($item['sum(price)']);
           
            
            $menus->append($aaa);
            $menu->next();
        }



       
        require_once 'view/owner/report.php';
    }

    // public function logout() {
    //
    //     $_SESSION['is_logged'] = FALSE;
    //     $_SESSION['id'] = '';
    //     $login_result = FALSE;
    //     session_unset();
    //     session_destroy();
    //     header('location:index.php');
    // }
}
