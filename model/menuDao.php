<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menuDao
 *
 * @author faqih
 */
class menuDao implements menuInterface {

    public function add(\menu $vmenu) {
        $result = FALSE;
        try {
            $conn = conection::getconection();
            $conn->beginTransaction();
            $sql = "INSERT into menu(id_service,name,price) values (?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $vmenu->getId_service());
            $stmt->bindParam(2, $vmenu->getName());
            $stmt->bindParam(3, $vmenu->getPrice());

            $result = $stmt->execute();
            $conn->commit();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $result;
    }

    public function del(\menu $vmenu) {
        $result = FALSE;
        try {
            $conn = conection::getconection();
            $conn->beginTransaction();
            $sql = "DELETE from menu where id_menu=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $vmenu->getId_menu());
            $result = $stmt->execute();
            $conn->commit();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $result;
    }

    public function get_menu(\menu $vmenu) {
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from menu where id_menu = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $vmenu->getId_menu());
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $stmt;
    }

    public function get_menu_by_id($id_menu) {
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from menu where id_menu = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $id_menu);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $stmt;
    }

    public function get_menu_by_service($id_service) {
        $menus = new ArrayObject();
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from menu where id_service = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $id_service);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $menu = new menu();
                $menu->setId_menu($row['id_menu']);
                $menu->setId_service($row['id_service']);
                $menu->setName($row['name']);
                $menu->setPrice($row['price']);
                $menus->append($menu);
            }
            
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $menus;
    }

    public function upd(\menu $vmenu) {
        $result = FALSE;
        try {
            $conn = conection::getconection();
            $conn->beginTransaction();
            $sql = "UPDATE menu set name=?, price=? where id_menu=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $vmenu->getName());
            $stmt->bindParam(2, $vmenu->getPrice());
            $stmt->bindParam(3, $vmenu->getId_menu());
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
