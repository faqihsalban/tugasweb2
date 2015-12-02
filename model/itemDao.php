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
            $sql = "DELETE from item where id_item=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $vitem->getId_item());
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
        $items = new ArrayObject();
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from item where id_transac = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $id_transac);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $item = new item();
                $item->setId_item($row['id_item']);
                $item->setId_menu($row['id_menu']);
                $item->setId_transac($row['id_transac']);
                $item->setQty($row['qty']);
                $item->setPrice($row['price']);
                $items->append($item);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $items;
    }
 public function hitung_total($id_transac) {
     
        try {
            $conn = conection::getconection();
            $sql = "SELECT SUM(price) from item where id_transac = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $id_transac);
            $stmt->execute();
           $hasil = $stmt->fetch();

        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $hasil['SUM(price)'];
    }

    public function get_report_menu($id_menu) {
      
        try {
            $conn = conection::getconection();
            $sql = "SELECT sum(qty),sum(price) from item where id_menu = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $id_menu);
            $stmt->execute();
            $menu = $stmt->fetch();
            
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $menu;
    }

}
