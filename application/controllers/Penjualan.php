<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Penjualan extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->library('form_validation');
    }


      function index_get() {
        $id_penjualan_m = $this->get('id_penjualan_m');
        if ($id_penjualan_m == '') {
            $pnj = $this->db->select(' t1.id_penjualan_m, t1.nomor_nota, t1.grand_total, t2.nama as nama_perusahaan, t3.username as pic, t1.tanggal')
            ->from('pj_penjualan_master as t1')
            ->join('pj_perusahaan as t2', 't1.id_perusahaan = t2.id_perusahaan', 'LEFT')
            ->join('users as t3', 't1.id_user = t3.user_id', 'LEFT')
            ->get()->result();
            $penjualan =  
                array(
                    'status' => 'success',
                    'message' => 'transaction Found',
                    'penjualan' => $pnj
            );
        }
        else
        {
             $pnj = $this->db->select(' t1.jumlah_beli, t1.harga_satuan, t1.total, t2.nama_barang')
            ->from('pj_penjualan_detail as t1')
            ->where('t1.id_penjualan_m',$id_penjualan_m)
            ->join('pj_barang as t2', 't1.id_barang = t2.id_barang', 'LEFT')
            ->get()->result();
            $penjualan =  
                array(
                    'status' => 'success',
                    'message' => 'transaction Found',
                    'penjualan' => $pnj
            );
        }
         
        $this->response($penjualan, 200);
        
    }


    //Masukan function selanjutnya disini
}
?>