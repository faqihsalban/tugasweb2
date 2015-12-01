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
    private $id_item;
    private $id_menu;
    private $qty;
    private $price;
    public function getId_item() {
        return $this->id_item;
    }

    public function setId_item($id_item) {
        $this->id_item = $id_item;
    }

        public function getId_transac() {
        return $this->id_transac;
    }

    public function getId_menu() {
        
        return $this->id_menu;
    }
    public function getName_menu() {
          try {
            $conn = conection::getconection();
            $sql = "SELECT name from menu where id_menu = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->id_menu);
            $stmt->execute();
            $row = $stmt->fetch();
                         
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $row['name'];
        //return $this->id_menu;
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
