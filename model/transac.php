<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of transaksi
 *
 * @author faqih
 */
class transac {

    //put your code here
    private $id_transac;
    private $id_user;
    private $id_driver;
    private $address;
    private $total;
    private $status;
    private $date;

    public function getId_transac() {
        return $this->id_transac;
    }

    public function getId_user() {
        return $this->id_user;
    }

    public function getId_driver() {
        return $this->id_driver;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getTotal() {
        try {
            $conn = conection::getconection();
            $sql = "SELECT SUM(price) from item where id_transac = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->id_transac);
            $stmt->execute();
            $hasil = $stmt->fetch();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $hasil['SUM(price)'];


        // return $this->total;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getDate() {
        return $this->date;
    }

    public function setId_transac($id_transac) {
        $this->id_transac = $id_transac;
    }

    public function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    public function setId_driver($id_driver) {
        $this->id_driver = $id_driver;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setDate($date) {
        $this->date = $date;
    }

}
