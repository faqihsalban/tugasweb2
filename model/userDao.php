<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userDao
 *
 * @author faqih
 */
class userDao implements userInterface {

    //put your code here
    public function add(\user $vuser) {
        $result = FALSE;
        try {
            $conn = conection::getconection();
            $conn->beginTransaction();
            $sql = "INSERT into user(name,username,password,email,phone,role) values (?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $vuser->getName());
            $stmt->bindParam(2, $vuser->getUsername());
            $stmt->bindParam(3, $vuser->getPassword());
            $stmt->bindParam(4, $vuser->getEmail());
            $stmt->bindParam(5, $vuser->getPhone());
            $stmt->bindParam(6, $vuser->getRole());

            $result = $stmt->execute();
            $conn->commit();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $result;
    }

    public function del(\user $vuser) {
        $result = FALSE;
        try {
            $conn = conection::getconection();
            $conn->beginTransaction();
            $sql = "DELETE from user where id_user=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $vuser->getId_user());

            $result = $stmt->execute();
            $conn->commit();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $result;
    }

    public function get_all_user() {
        $users = new ArrayObject();
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from user ";
            $stmt = $conn->prepare($sql);
            
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $user = new user();
                $user->setId_user($row['id_user']);
                $user->setName($row['name']);
                $user->setPassword($row['password']);
                $user->setPhone($row['phone']);
                $user->setUsername($row['username']);
                $user->setRole($row['role']);
                $user->setEmail($row['email']);
                $user->setDate_join($row['date_join']);
                $users->append($user);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $users;
    }

    public function get_user(\user $vuser) {
        $users = new ArrayObject();
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from user where id_user=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $vuser->getId_user());
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $user = new user();
                $user->setId_user($row['id_user']);
                $user->setName($row['name']);
                $user->setPassword($row['password']);
                $user->setPhone($row['phone']);
                $user->setUsername($row['username']);
                $user->setRole($row['role']);
                $user->setEmail($row['email']);
                $user->setDate_join($row['date_join']);
                //$users->append($user);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $user;
    }

    public function get_user_by_id($id_user) {
        $users = new ArrayObject();
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from user where id_user=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $id_user);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $user = new user();
                $user->setId_user($row['id_user']);
                $user->setName($row['name']);
                $user->setPassword($row['password']);
                $user->setPhone($row['phone']);
                $user->setUsername($row['username']);
                $user->setRole($row['role']);
                $user->setEmail($row['email']);
                $user->setDate_join($row['date_join']);
                //$users->append($user);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $user;
    }

    public function get_user_by_role($role) {
       $users = new ArrayObject();
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from user where role=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $role);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $user = new user();
                $user->setId_user($row['id_user']);
                $user->setName($row['name']);
                $user->setPassword($row['password']);
                $user->setPhone($row['phone']);
                $user->setUsername($row['username']);
                $user->setRole($row['role']);
                $user->setEmail($row['email']);
                $user->setDate_join($row['date_join']);
                $users->append($user);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $users;
    }

    public function upd(\user $vuser) {
        $result = FALSE;
        try {
            $conn = conection::getconection();
            $conn->beginTransaction();
            $sql = "UPDATE user set name=?, password=?, phone=?, email=? where id_user=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $vuser->getName());
            $stmt->bindParam(2, $vuser->getPassword());
            $stmt->bindParam(3, $vuser->getPhone());
            $stmt->bindParam(4, $vuser->getEmail());
            $stmt->bindParam(5, $vuser->getId_user());
            $result = $stmt->execute();
            $conn->commit();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $result;
    }
  public function adminupd(\user $vuser) {
        $result = FALSE;
        try {
            $conn = conection::getconection();
            $conn->beginTransaction();
            $sql = "UPDATE user set name=?, email=?, phone=?, role=? where id_user=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $vuser->getName());
            $stmt->bindParam(2, $vuser->getEmail());
            $stmt->bindParam(3, $vuser->getPhone());
            $stmt->bindParam(4, $vuser->getRole());
            $stmt->bindParam(5, $vuser->getId_user());
            $result = $stmt->execute();
            $conn->commit();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $result;
    }
    public function login(\user $vuser) {

        $login_result = FALSE;
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from user where username= ? AND password= ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $vuser->getUsername());
            $stmt->bindParam(2, $vuser->getPassword());
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                while ($row = $stmt->fetch()) {
                    $_SESSION['is_logged'] = TRUE;
                    $_SESSION['id_user'] = $row['id_user'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['name'] = $row['name'];
                    $login_result = TRUE;
                }
                $login_result = TRUE;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        return $login_result;
    }

   

}
