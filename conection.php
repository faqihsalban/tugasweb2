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
        try{
          $db_handler= new PDO("mysql:host=127.0.0.1:49233; Database = delibox", "azure", "password");
          $db_handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $db_handler;
        }
        catch(Exception $e){
          echo $e->getMessage();
          die();
        }
    }

    

}



