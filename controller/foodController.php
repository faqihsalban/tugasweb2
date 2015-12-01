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
        $items = new ArrayObject();

        if (isset($_POST['btn_checkout'])) {
//            $barang = $items->getIterator();
//
//            while ($barang->valid()) {
//                $this->itemdao->add($barang);
//                $barang->next();
//            }
            $_SESSION['createTransac'] = FALSE;
        }

        if (isset($_GET['service'])) {
            $id_service = $_GET['service'];
            $menu = $this->menudao->get_menu_by_service($id_service)->getIterator();
        }
        if (isset($_POST['btn_transac'])) {
            $last = $this->transacdao->get_last_id();
            $_SESSION['id_transac'] = $last['max(id_transac)'] + 1;
            $transaksi = new transac();
            $transaksi->setId_transac($_SESSION['id_transac']);
            $transaksi->setId_user($_SESSION['id_user']);
            $transaksi->setTotal(0);
            $transaksi->setStatus(0);
            $transaksi->setAddress($_POST['address']);
            //  echo $id_transac;
            $this->transacdao->add($transaksi);

            // $this->transacdao->add($transaksi);
            $_SESSION['createTransac'] = TRUE;
        }

        if (isset($_POST['btn_pesan'])) {
            //cari last id transac nya buat dipake sama si item  $lastId = $this->
            //  $last = $this->transacdao->get_last_id();
            // $id_transac = $last['max(id_transac)'];
            $tempmenu = $this->menudao->get_menu_by_id($_POST['id_menu']);
            $item = new item();
            $item->setId_menu($_POST['id_menu']);
            $item->setId_transac($_SESSION['id_transac']);
            $item->setQty($_POST['qty']);
            // echo "ini kuantiti "; 
            // echo $_POST['qty'];
            $item->setPrice(($tempmenu->getPrice()) * ($_POST['qty']));
             $this->itemdao->add($item);
            $items->append($item);
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
