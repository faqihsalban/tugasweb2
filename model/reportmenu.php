<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reportmenu
 *
 * @author faqih
 */
class reportmenu {

    //put your code here
    private $name;
    private $qty;
    private $price;
    public function getName() {
        return $this->name;
    }

    public function getQty() {
        return $this->qty;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setQty($qty) {
        $this->qty = $qty;
    }

    public function setPrice($price) {
        $this->price = $price;
    }



}
