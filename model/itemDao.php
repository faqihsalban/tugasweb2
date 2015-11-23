<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of itemDao
 *
 * @author faqih
 */
class itemDao implements itemInterface {

    public function add(\item $vitem) {
        $result = FALSE;
        try {
            $conn = conection::getconection();
            $conn->beginTransaction();
            $sql = "INSERT into item(id_transac,id_menu,qty,price) values (?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $vitem->getId_transac());
            $stmt->bindParam(2, $vitem->getId_menu());
            $stmt->bindParam(3, $vitem->getQty());
            $stmt->bindParam(4, $vitem->getPrice());
            $result = $stmt->execute();
            $conn->commit();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
          $conn = NULL;
        return $result;
    }

    public function del(\item $vitem) {
        $result = FALSE;
        try {
            $conn = conection::getconection();
            $conn->beginTransaction();
            $sql = "DELETE from item where id_transac=? and id_menu=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $vitem->getId_transac());
            $stmt->bindParam(2, $vitem->getId_menu());
            $result = $stmt->execute();
            $conn->commit();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $result;
    }

    public function get_item_by_transac($id_transac) {
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from item where id_transac = ?";
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

}
