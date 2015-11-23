<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of transacDao
 *
 * @author faqih
 */
class transacDao implements transacInterface {

    public function add(\transac $vtransac) {
        $result = FALSE;
        try {
            $conn = conection::getconection();
            $conn->beginTransaction();
            $sql = "INSERT into transac(id_user,address,total,status) values (?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $vtransac->getId_user());
            $stmt->bindParam(2, $vtransac->getAddress());
            $stmt->bindParam(3, $vtransac->getTotal());
            $stmt->bindParam(4, $vtransac->getStatus());

            $result = $stmt->execute();
            $conn->commit();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $result;
    }

    public function del(\transac $vtransac) {
        $result = FALSE;
        try {
            $conn = conection::getconection();
            $conn->beginTransaction();
            $sql = "DELETE from transac where id_transac=?";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(1, $vtransac->getId_transac());
            $result = $stmt->execute();
            $conn->commit();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $result;
    }

    public function get_all_transac(DateTime $date1, DateTime $date2) {
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from transac where date between ? and ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $date1);
            $stmt->bindParam(2, $date2);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $stmt;
    }

    public function get_transac(\transac $vtransac) {
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from transac where id_transac = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $vtransac->getId_transac());
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $stmt;
    }

    public function get_transac_by_id($id_transac) {
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from transac where id_transac = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $id_transac);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $stmt;
    }

    public function get_transac_by_user($id_user) {
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from transac where id_user = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $id_user);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $stmt;
    }

    public function upd_status(\transac $vtransac) {
        $result = FALSE;
        try {
            $conn = conection::getconection();
            $conn->beginTransaction();
            $sql = "UPDATE transac set status=? where id_transac=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $vtransac->getStatus());
            $stmt->bindParam(2, $vtransac->getId_transac());

            $result = $stmt->execute();
            $conn->commit();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $result;
    }

    public function get_transac_by_driver($id_driver) {
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from transac where id_driver = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $id_driver);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $stmt;
    }

    public function upd_driver(\transac $vtransac) {
        $result = FALSE;
        try {
            $conn = conection::getconection();
            $conn->beginTransaction();
            $sql = "UPDATE transac set id_driver=? where id_transac=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $vtransac->getId_driver());
            $stmt->bindParam(2, $vtransac->getId_transac());

            $result = $stmt->execute();
            $conn->commit();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $result;
    }

//put your code here
}
