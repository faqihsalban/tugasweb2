<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of serviceDao
 *
 * @author faqih
 */
class serviceDao implements serviceInterface {

    public function add(\service $vservice) {
        $result = FALSE;
        try {
            $conn = conection::getconection();
            $conn->beginTransaction();
            $sql = "INSERT into service(name,address,phone,type) values (?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $vservice->getName());
            $stmt->bindParam(2, $vservice->getAddress());
            $stmt->bindParam(3, $vservice->getPhone());
            $stmt->bindParam(4, $vservice->getType());

            $result = $stmt->execute();
            $conn->commit();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $result;
    }

    public function del(\service $vservice) {
        $result = FALSE;
        try {
            $conn = conection::getconection();
            $conn->beginTransaction();
            $sql = "DELETE from service where id_service=?";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(1, $vservice->getId_service());
            $result = $stmt->execute();
            $conn->commit();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $result;
    }

    public function get_service(\service $vservice) {
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from service where is_service = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $vservice->getId_service());
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $stmt;
    }

    public function get_service_by_id($id_service) {
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from service where is_service = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $id_service);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $stmt;
    }

    public function get_service_by_type($type) {
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from service where type = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $type);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $stmt;
    }

    public function upd(\service $vservice) {
        $result = FALSE;
        try {
            $conn = conection::getconection();
            $conn->beginTransaction();
            $sql = "UPDATE service set name=?, address=?, phone=? where Id_service=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $vservice->getName());
            $stmt->bindParam(2, $vservice->getAddress());
            $stmt->bindParam(3, $vservice->getPhone());
            $stmt->bindParam(3, $vservice->getId_service());
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
