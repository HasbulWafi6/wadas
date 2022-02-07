<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Items extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->library('form_validation');
    }


    function index_get() {

            $usr = $this->db->select(' t1.id_barang, t1.kode_barang, t1.nama_barang, t1.total_stok, t1.harga, t2.kategori, t3.merk')
            ->from('pj_barang as t1')
            ->join('pj_kategori_barang as t2', 't1.id_kategori_barang = t2.id_kategori_barang', 'LEFT')
            ->join('pj_merk_barang as t3', 't1.id_merk_barang = t3.id_merk_barang', 'LEFT')
            ->get()->result();
            $items =  
                array(
                    'status' => 'success',
                    'message' => 'transaction Found',
                    'item' => $usr
            );
        
         
        $this->response($items, 200);
        
    }

    function index_post() {
        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('id_kategori_barang', 'Kategori', 'required');
        $this->form_validation->set_rules('id_merk_barang', 'Merk', 'required');
        $this->form_validation->set_rules('total_stok', 'Total Stock', 'required|alpha_numeric');
        $this->form_validation->set_rules('harga', 'Harga', 'required|alpha_numeric');
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view("admin/items/new_form");
        }
        else
        {
            $data = array(
                        'kode_barang'          => $this->post('kode_barang'),
                        'nama_barang'          => $this->post('nama_barang'),
                        'total_stok'          => $this->post('total_stok'),
                        'harga'          => $this->post('harga'),
                        'id_kategori_barang'          => $this->post('id_kategori_barang'),
                        'id_merk_barang'          => $this->post('id_merk_barang'),
                        'keterangan'    => $this->post('keterangan'));
            $insert = $this->db->insert('pj_barang', $data);
            if ($insert) {
                $this->response($data, 200);
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                redirect('admin/items','refesh');
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
        
    }


    function index_put() {
        $id_barang = $this->put('id_barang');
        $data = array(
                        'kode_barang'          => $this->put('kode_barang'),
                        'nama_barang'          => $this->put('nama_barang'),
                        'total_stok'          => $this->put('total_stok'),
                        'harga'          => $this->put('harga'),
                        'id_kategori_barang'          => $this->put('id_kategori_barang'),
                        'id_merk_barang'          => $this->put('id_merk_barang'),
                        'keterangan'    => $this->put('keterangan'));
        $this->db->where('id_barang', $id_barang);
        $update = $this->db->update('pj_barang', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {
        $id_barang = $this->delete('id_barang');
        $this->db->where('id_barang', $id_barang);
        $delete = $this->db->delete('pj_barang');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            redirect('admin/items','refesh');
        } else {
            $this->response(array('status' => 'fail', 502));
            redirect('admin/items','refesh');
        }
    }


    //Masukan function selanjutnya disini
}
?>