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
        $services = new ArrayObject();
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from service where type = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $type);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $service = new service();
                $service->setId_service($row['id_service']);
                $service->setName($row['name']);
                $service->setAddress($row['address']);
                $service->setPhone($row['phone']);
                $service->setType($row['type']);
                $service->setId_user($row['id_user']);

                $services->append($service);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $services;
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
