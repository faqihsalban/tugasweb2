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
interface menuInterface {
    //put your code here
    public function get_menu_by_service($id_service);
    public function get_all_menu_by_service($id_service);
    public function get_menu_by_id($id_menu);
    public function get_menu(menu $vmenu);
    public function add(menu $vmenu);
    public function del(menu $vmenu);
    public function upd(menu $vmenu);

}
