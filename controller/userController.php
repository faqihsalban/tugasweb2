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

    public function __construct() {
        $this->userdao = new userDao();
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
                $login_result =$this->userdao->login($usr);
                if ($login_result) {
                    header("location:view/main.php");
                } else {
                    echo "Username dan password salah";
                }
            }
        }
        require_once '/home.php';
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
