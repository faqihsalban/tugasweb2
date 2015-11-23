<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menu
 *
 * @author faqih
 */
class menu {
    //put your code here
    private $id_menu;
    private $id_service;
    private $name;
    private $price;
    
    public function getId_menu() {
        return $this->id_menu;
    }

    public function getId_service() {
        return $this->id_service;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setId_menu($id_menu) {
        $this->id_menu = $id_menu;
    }

    public function setId_service($id_service) {
        $this->id_service = $id_service;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPrice($price) {
        $this->price = $price;
    }



}
