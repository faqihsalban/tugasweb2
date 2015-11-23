<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userClass
 *
 * @author faqih
 */
class user {
    
    private $id_user;
    private $name;
    private $username;
    private $password;
    private $email;
    private $phone;
    private $role;
    private $date_join;
    
    public function getId_user() {
        return $this->id_user;
    }

    public function getName() {
        return $this->name;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getRole() {
        return $this->role;
    }

    public function getDate_join() {
        return $this->date_join;
    }

    public function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function setDate_join($date_join) {
        $this->date_join = $date_join;
    }


    
       
}
