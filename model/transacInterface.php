<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author faqih
 */
interface transacInterface {
    //put your code here
    public function get_all_transac(DateTime $date1, DateTime $date2);
    public function get_transac_by_user($id_user);
    public function get_transac_by_driver($id_driver);
    public function get_transac_by_id($id_transac);
    public function get_transac(transac $vtransac );
    public function add(transac $vtransac );
    public function del(transac $vtransac );
    public function upd_status(transac $vtransac );
    public function upd_driver(transac $vtransac );
    
}
