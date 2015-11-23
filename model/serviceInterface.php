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
interface serviceInterface {
    //put your code here
    public function get_service_by_type($type);
    public function get_service_by_id($id_service);
    public function get_service(service $vservice);
    public function add(service $vservice);
    public function del(service $vservice);
    public function upd(service $vservice);
}
