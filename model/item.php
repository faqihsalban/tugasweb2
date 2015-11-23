<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of item
 *
 * @author faqih
 */
class item {
    //put your code here
    private $id_transac;
    private $id_menu;
    private $qty;
    private $price;
    public function getId_transac() {
        return $this->id_transac;
    }

    public function getId_menu() {
        return $this->id_menu;
    }

    public function getQty() {
        return $this->qty;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setId_transac($id_transac) {
        $this->id_transac = $id_transac;
    }

    public function setId_menu($id_menu) {
        $this->id_menu = $id_menu;
    }

    public function setQty($qty) {
        $this->qty = $qty;
    }

    public function setPrice($price) {
        $this->price = $price;
    }


}
