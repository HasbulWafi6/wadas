<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Kategori extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->library('form_validation');
    }


    function index_get() {

         $usr = $this->db->select('*')
            ->from('pj_kategori_barang')
            ->get()->result();
            $kategori =  
                array(
                    'status' => 'success',
                    'message' => 'Kategori Found',
                    'kategori' => $usr
            );
         
        $this->response($kategori, 200);
        
    }

    function index_post() {
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view("admin/kategori/new_form");
        }
        else
        {
            $data = array(
                        'kategori'    => $this->post('kategori'));
            $insert = $this->db->insert('pj_kategori_barang', $data);
            if ($insert) {
                $this->response($data, 200);
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                redirect('admin/kategori','refesh');
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
        
    }


    function index_put() {
        $id_kategori_barang = $this->put('id_kategori_barang');
        $data = array(
                        'kategori'    => $this->put('kategori'));
        $this->db->where('id_kategori_barang', $id_kategori_barang);
        $update = $this->db->update('pj_kategori_barang', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {
        $id_kategori_barang = $this->delete('id_kategori_barang');
        $this->db->where('id_kategori_barang', $id_kategori_barang);
        $delete = $this->db->delete('pj_kategori_barang');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            redirect('admin/kategori','refesh');
        } else {
            $this->response(array('status' => 'fail', 502));
            redirect('admin/kategori','refesh');
        }
    }


    //Masukan function selanjutnya disini
}
?>