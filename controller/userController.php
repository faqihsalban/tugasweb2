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

    public function __construct() {
        $this->userdao = new userDao();
        $this->transacdao = new transacDao();
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
                $login_result = $this->userdao->login($usr);
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
                    echo "Username dan password salah";
                }
            }
        } else
            require_once '/home.php';
    }

    public function user() {
        require_once '/view/user/main.php';
    }

    public function driver() {
        $result = $this->transacdao->get_transac_by_status(0)->getIterator();
echo 
        require_once '/view/driver/main.php';
    }

    public function admin() {
        require_once '/view/admin/main.php';
    }

    public function owner() {
        require_once '/view/owner/main.php';
    }

    public function editprofile() {
        $user = $this->userdao->get_user_by_id($_SESSION['id_user'])->fetch();
        if (isset($_POST['btn_update'])) {
            $userbaru = new user();
            $userbaru->setName($_POST['name']);
            $userbaru->setPassword(md5($_POST['password']));
            $userbaru->setEmail($_POST['email']);
            $userbaru->setPhone($_POST['phone']);
            $userbaru->setId_user($_SESSION['id_user']);

            if ($this->userdao->upd($userbaru))
                echo "sukses";
            header("location: index.php?menu=user");
        }


        require_once '/view/editprofile.php';
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
