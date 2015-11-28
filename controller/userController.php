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

    public function __construct() {
        $this->userDao = new userDao();
        $this->transacDao = new transacDao();
        $this->servicedao = new serviceDao();
        $this->menudao = new menuDao();
    }

    public function index() {
        if (isset($_POST['btn_login'])) {
            $username = trim($_POST['username']);
            $password = md5(trim($_POST['password']));

            if (empty($username) || empty($password)) {
                echo "tidak boleh kosong";
            } else {
                $usr = new user();
                $usr->setUsername($username);
                $usr->setPassword($password);
                $login_result = $this->userDao->login($usr);
                if ($login_result) {
                    if ($_SESSION['role'] == 1)
                        header("location: index.php?menu=admin");
                    else if ($_SESSION['role'] == 2)
                        header("location: index.php?menu=user");
                    else if ($_SESSION['role'] == 3)
                        header("location: index.php?menu=driver");
                    else if ($_SESSION['role'] == 4)
                        header("location: index.php?menu=owner");
                } else {
                    echo "
                        <script>
                        alertify.Error('Username dan Password salah');
                        </script>
                       ";
                }
            }
        } else
            require_once './home.php';
    }

    public function user() {
        require_once '/view/user/userMain.php';
    }

    public function login() {
        require_once 'login.php';
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
            $user->setPhone($phone);
            $this->$userdao->add($user);
        }
        $dataUser = $this->userDao->get_all_user()->getIterator();
        require_once 'signup.php';
    }

    public function driver() {
        if (isset($_GET['service'])) {
            $vtransac = new transac();
            $vtransac->setId_transac($_GET['service']);
            $vtransac->setStatus(1);

            $pesan = $this->transacdao->upd_status($vtransac);
        }

        $result = $this->transacdao->get_transac_by_status(0)->getIterator();
        $onproces = $this->transacdao->get_transac_by_status(1)->getIterator();

        require_once '/view/driver/DriverMain.php';
    }

    public function admin() {
        require_once '/view/admin/adminMain.php';
    }

    public function editMenu() {
        
        $id_menu = $_GET['id'];
        $menu = $this->menudao->get_menu_by_id($id_menu);
        require_once '/view/owner/editmenu.php';
    }

    public function owner() {

        $services = $this->servicedao->get_service_by_user($_SESSION['id_user'])->getIterator();

        if (isset($_GET['service'])) {
            $id_service = $_GET['service'];
            $menu = $this->menudao->get_menu_by_service($id_service)->getIterator();
        }
         require_once '/view/owner/ownerMain.php';
    }

    public function editProfile() {
        $user = $this->userDao->get_user_by_id($_SESSION['id_user']);
        if (isset($_POST['btn_update'])) {
            $userbaru = new user();
            $userbaru->setName($_POST['name']);
            $userbaru->setPassword(md5($_POST['password']));
            $userbaru->setEmail($_POST['email']);
            $userbaru->setPhone($_POST['phone']);
            $userbaru->setId_user($_SESSION['id_user']);

            if ($this->userDao->upd($userbaru))
                echo "sukses";
            header("location: index.php?menu=user");
        }


        require_once '/view/editProfile.php';
    }

    public function userEditProfile() {
        $user = $this->userDao->get_user_by_id($_SESSION['id_user']);

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
                $this->userDao->upd($userbaru);
                echo "
                    <script>
                    alertify.alert('Password Tidak Sesuai Konfirmasi');
                    </script>
                   ";
            } else {
                // echo "alalalala";
                header("location:index.php?menu=userMain");
            }
        }
        require_once '/view/user/userEditProfile.php';
    }

    public function ownerEditProfile() {
        $user = $this->userDao->get_user_by_id($_SESSION['id_user']);

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
                $this->userDao->upd($userbaru);
                echo "
                    <script>
                    alertify.alert('Password Tidak Sesuai Konfirmasi');
                    </script>
                   ";
            } else {
                // echo "alalalala";
                header("location:index.php?menu=userMain");
            }
        }
        require_once '/view/owner/ownerEditProfile.php';
    }

    public function driverEditProfile() {
        $user = $this->userDao->get_user_by_id($_SESSION['id_user']);

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
                $this->userDao->upd($userbaru);
                echo "
                    <script>
                    alertify.alert('Password Tidak Sesuai Konfirmasi');
                    </script>
                   ";
            } else {
                // echo "alalalala";
                header("location:index.php?menu=userMain");
            }
        }
        require_once '/view/driver/driverEditProfile.php';
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
