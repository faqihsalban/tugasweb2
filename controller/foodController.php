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
    private $itemdao;
    private $transacdao;

    public function __construct() {
        $this->servicedao = new serviceDao();
        $this->menudao = new menuDao();
        $this->itemdao = new itemDao();
        $this->transacdao = new transacDao();
    }

    public function index() {

        $hasil = $this->servicedao->get_service_by_type(1)->getIterator();
        if (isset($_GET['service'])) {
            $id_service = $_GET['service'];
            $menu = $this->menudao->get_menu_by_service($id_service)->getIterator();
        }
        if (isset($_POST['btn_pesan'])) {
          //cari last id transac nya buat dipake sama si item  $lastId = $this->
            $transaksi = new transac();
            $transaksi->setDate(getdate());
            $transaksi->setId_user($_SESSION['id_user']);
            $transaksi->setTotal(0);
            $transaksi->setAddress($_POST['address']);
            $this->transacdao->add($transaksi);
            
            //itemnya belum dimasuki, masih bingun caranya pake checkbox aja gitu
            //item cuma butuh id menu sama id transac dan qty, kalo harganya langsung select dikali qty
          //$this->itemdao->add($vitem);
            //header("location: index.php?menu=userPesan");
        }
        require '/view/deliFood.php';
    }

    public function photocopy() {

        $hasil = $this->servicedao->get_service_by_type(3)->getIterator();
        if (isset($_GET['service'])) {
            $id_service = $_GET['service'];
            $menu = $this->menudao->get_menu_by_service($id_service)->getIterator();
        }

        require '/view/deliCopy.php';
    }

    public function laundry() {

        $hasil = $this->servicedao->get_service_by_type(2)->getIterator();
        if (isset($_GET['service'])) {
            $id_service = $_GET['service'];
            $menu = $this->menudao->get_menu_by_service($id_service)->getIterator();
        }

        require '/view/deliLaundry.php';
    }

    public function order() {
        
    }

    public function editMenu() {

        //udahhhh cek di usercontroller dibagian edit menu nya
        //
        //
        //
      // #qih ntar habis dia edit langsung tembak ke menu owner aja
        // header ('balik lagi ke index.php?menu=owner')
    }

}
