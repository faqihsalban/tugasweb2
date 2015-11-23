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
interface itemInterface {
    //put your code here
    public function add(item $vitem);
    public function del(item $vitem);
    public function get_item_by_transac($id_transac);
    
    

}
