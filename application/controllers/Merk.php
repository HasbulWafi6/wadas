<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Merk extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->library('form_validation');
    }


    function index_get() {

         $usr = $this->db->select('*')
            ->from('pj_merk_barang')
            ->get()->result();
            $merk =  
                array(
                    'status' => 'success',
                    'message' => 'merk Found',
                    'merk' => $usr
            );
         
        $this->response($merk, 200);
        
    }

    function index_post() {
        $this->form_validation->set_rules('merk', 'merk', 'required');
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view("admin/merk/new_form");
        }
        else
        {
            $data = array(
                        'merk'    => $this->post('merk'));
            $insert = $this->db->insert('pj_merk_barang', $data);
            if ($insert) {
                $this->response($data, 200);
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                redirect('admin/merk','refesh');
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
        
    }


    function index_put() {
        $id_merk_barang = $this->put('id_merk_barang');
        $data = array(
                        'merk'    => $this->put('merk'));
        $this->db->where('id_merk_barang', $id_merk_barang);
        $update = $this->db->update('pj_merk_barang', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {
        $id_merk_barang = $this->delete('id_merk_barang');
        $this->db->where('id_merk_barang', $id_merk_barang);
        $delete = $this->db->delete('pj_merk_barang');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            redirect('admin/merk','refesh');
        } else {
            $this->response(array('status' => 'fail', 502));
            redirect('admin/merk','refesh');
        }
    }


    //Masukan function selanjutnya disini
}
?>