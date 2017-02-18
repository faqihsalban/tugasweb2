<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conection
 *
 * @author faqih
 */
class conection {
   
   public static function getconection(){

            $connectstr_dbhost = '';
            $connectstr_dbname = '';
            $connectstr_dbusername = '';
            $connectstr_dbpassword = '';

            foreach ($_SERVER as $key => $value) {
                if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
                    continue;
                }
                
                $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
                $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
                $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
                $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
            }

            $link = mysqli_connect($connectstr_dbhost, $connectstr_dbusername, $connectstr_dbpassword,$connectstr_dbname);

        try{
          $db_handler= new PDO('mysql:host='$connectstr_dbhost; $connectstr_dbname, $connectstr_dbusername,  $connectstr_dbpassword);
          $db_handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $db_handler;
        }
        catch(Exception $e){
          echo $e->getMessage();
          die();
        }
    }

    

}



