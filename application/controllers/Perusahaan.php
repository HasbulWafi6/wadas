<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Perusahaan extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->library('form_validation');
    }


    function index_get() {
            $usr = $this->db->select('*')
            ->from('pj_perusahaan')
            ->get()->result();
            $perusahaan =  
                array(
                    'status' => 'success',
                    'message' => 'Perushaan Found',
                    'perusahaan' => $usr
            );
         
        $this->response($perusahaan, 200);
    }

    function index_post() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telp', 'Telp', 'required|alpha_numeric');
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view("admin/perusahaan/new_form");
        }
        else
        {
            $data = array(
                        'nama'          => $this->post('nama'),
                        'alamat'          => $this->post('alamat'),
                        'telp'    => $this->post('telp'));
            $insert = $this->db->insert('pj_perusahaan', $data);
            if ($insert) {
                $this->response($data, 200);
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                redirect('admin/perusahaan','refesh');
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
        
    }


    function index_put() {
        $id_perusahaan = $this->put('id_perusahaan');
        $data = array(
                    'nama'    => $this->put('nama'),
                    'alamat'    => $this->put('alamat'),
                    'telp'    => $this->put('telp'));
        $this->db->where('id_perusahaan', $id_perusahaan);
        $update = $this->db->update('pj_perusahaan', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {
        $id_perusahaan = $this->delete('id_perusahaan');
        $this->db->where('id_perusahaan', $id_perusahaan);
        $delete = $this->db->delete('pj_perusahaan');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            redirect('admin/perusahaan','refesh');
        } else {
            $this->response(array('status' => 'fail', 502));
            redirect('admin/perusahaan','refesh');
        }
    }


    //Masukan function selanjutnya disini
}
?>