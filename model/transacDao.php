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
            $sql = "INSERT into transac(id_user,address,status,id_transac) values (?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $vtransac->getId_user());
            $stmt->bindParam(2, $vtransac->getAddress());
        
            $stmt->bindParam(3, $vtransac->getStatus());
            $stmt->bindParam(4, $vtransac->getId_transac());

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
        $transacs = new ArrayObject();
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from transac where date between ? and ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $date1);
            $stmt->bindParam(2, $date2);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $transac = new transac();
                $transac->setId_transac($row['id_transac']);
                $transac->setId_user($row['id_user']);
                $transac->setId_driver($row['id_driver']);
                $transac->setAddress($row['address']);
                $transac->setStatus($row['status']);
                $transac->setTotal($row['total']);

                $transacs->append($transac);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $transacs;
    }

    public function get_transac(\transac $vtransac) {
        $transacs = new ArrayObject();
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from transac where id_transac = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $vtransac->getId_transac());
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $transac = new transac();
                $transac->setId_transac($row['id_transac']);
                $transac->setId_user($row['id_user']);
                $transac->setId_driver($row['id_driver']);
                $transac->setAddress($row['address']);
                $transac->setStatus($row['status']);
                $transac->setTotal($row['total']);

                $transacs->append($transac);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $transacs;
    }

    public function get_transac_by_id($id_transac) {
        // $transacs = new ArrayObject();
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from transac where id_transac = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $id_transac);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $transac = new transac();
                $transac->setId_transac($row['id_transac']);
                $transac->setId_user($row['id_user']);
                $transac->setId_driver($row['id_driver']);
                $transac->setAddress($row['address']);
                $transac->setStatus($row['status']);
                $transac->setTotal($row['total']);

                // $transacs->append(transac);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $transac;
    }

    public function get_transac_by_user($id_user) {
        $transacs = new ArrayObject();
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from transac where id_user = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $id_user);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $transac = new transac();
                $transac->setId_transac($row['id_transac']);
                $transac->setId_user($row['id_user']);
                $transac->setId_driver($row['id_driver']);
                $transac->setAddress($row['address']);
                $transac->setStatus($row['status']);
                $transac->setTotal($row['total']);

                $transacs->append($transac);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $transacs;
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
        $transacs = new ArrayObject();
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from transac where id_driver = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $id_driver);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $transac = new transac();
                $transac->setId_transac($row['id_transac']);
                $transac->setId_user($row['id_user']);
                $transac->setId_driver($row['id_driver']);
                $transac->setAddress($row['address']);
                $transac->setStatus($row['status']);
                $transac->setTotal($row['total']);

                $transacs->append($transac);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $transacs;
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

    public function get_transac_by_status($status) {
        $transacs = new ArrayObject();
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from transac where status = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $status);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $transac = new transac();
                $transac->setId_transac($row['id_transac']);
                $transac->setId_user($row['id_user']);
                $transac->setId_driver($row['id_driver']);
                $transac->setAddress($row['address']);
                $transac->setStatus($row['status']);
                $transac->setTotal($row['total']);

                $transacs->append($transac);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $transacs;
    }

    public function get_transac_by_driver_status($id_driver, $status) {
        $transacs = new ArrayObject();
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from transac where id_driver = ? and status = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $id_driver);
            $stmt->bindParam(2, $status);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $transac = new transac();
                $transac->setId_transac($row['id_transac']);
                $transac->setId_user($row['id_user']);
                $transac->setId_driver($row['id_driver']);
                $transac->setAddress($row['address']);
                $transac->setStatus($row['status']);
                $transac->setTotal($row['total']);

                $transacs->append($transac);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $transacs;
    }

    public function get_transac_by_user_status($id_user, $status) {
        $transacs = new ArrayObject();
        try {
            $conn = conection::getconection();
            $sql = "SELECT * from transac where id_user = ? and status = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $id_user);
            $stmt->bindParam(2, $status);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $transac = new transac();
                $transac->setId_transac($row['id_transac']);
                $transac->setId_user($row['id_user']);
                $transac->setId_driver($row['id_driver']);
                $transac->setAddress($row['address']);
                $transac->setStatus($row['status']);
                $transac->setTotal($row['total']);

                $transacs->append($transac);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $transacs;
    }

    public function get_last_id() {
        try {
            $conn = conection::getconection();
            $sql = "SELECT max(id_transac) from transac";
            $stmt = $conn->prepare($sql);
          //  $stmt->bindParam(1, $id_transac);
            $stmt->execute();
           $hasil = $stmt->fetch();

        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $conn = NULL;
        return $hasil;
    }

//put your code here
}
