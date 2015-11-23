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
interface userInterface {
    public function get_all_user();
    public function get_user(\user $vuser);
    public function get_user_by_id($id_user);
    public function get_user_by_role($role);
    public function add(\user $vuser);
    public function del(\user $vuser);
    public function upd(\user $vuser);
    public function login(\user $vuser);

}
