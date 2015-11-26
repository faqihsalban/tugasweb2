<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of foodController
 *
 * @author faqih
 */
class foodController {
    //put your code here
    
     private $servicedao;
     private $menudao;

    public function __construct() {
        $this->servicedao = new serviceDao();
        $this->menudao = new menuDao();
    }

    public function index() {
        
        $hasil = $this->servicedao->get_service_by_type(1)->getIterator();
        if(isset($_GET['service']))
        {
            $id_service = $_GET['service'];
            $menu = $this->menudao->get_menu_by_service($id_service)->getIterator();
            
        }
        
        require '/view/deliFood.php';
    }
    public function photocopy() {
        
        $hasil = $this->servicedao->get_service_by_type(2)->getIterator();
        if(isset($_GET['service']))
        {
            $id_service = $_GET['service'];
            $menu = $this->menudao->get_menu_by_service($id_service)->getIterator();
            
        }
        
        require '/view/deliCopy.php';
    }
    public function laundry() {
        
        $hasil = $this->servicedao->get_service_by_type(3)->getIterator();
        if(isset($_GET['service']))
        {
            $id_service = $_GET['service'];
            $menu = $this->menudao->get_menu_by_service($id_service)->getIterator();
            
        }
        
        require '/view/deliLaundry.php';
    }
}
