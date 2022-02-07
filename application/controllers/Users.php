<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Users extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->library('form_validation');
    }


    function index_get() {
            $usr = $this->db->select('*')
            ->from('users')
            ->get()->result();
            $users =  
                array(
                    'status' => 'success',
                    'message' => 'User Found',
                    'user' => $usr
            );
         
        $this->response($users, 200);
    }

    function index_post() {
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|alpha_numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $rd['role_ot'] = $this->db->role_enum('users','role'); 
            $this->load->view("admin/users/new_form",$rd);
        }
        else
        {
            $password = $this->post('password');
            $data = array(
                        'username'          => $this->post('username'),
                        'password' => password_hash($password, PASSWORD_DEFAULT),
                        'email'    => $this->post('email'),
                        'phone'    => $this->post('phone'),
                        'role'    => $this->post('role_ot'),
                        'is_active'    => '1');
            $insert = $this->db->insert('users', $data);
            if ($insert) {
                $this->response($data, 200);
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                redirect('admin/users','refesh');
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
        
    }


    function index_put() {
        $user_id = $this->put('user_id');
        $data = array(
                    'username'    => $this->put('username'),
                    'password'    => password_hash($this->put('password'), PASSWORD_DEFAULT),
                    'email'    => $this->put('email'),
                    'phone'    => $this->put('phone'),
                    'role'    => $this->put('role'));
        $this->db->where('user_id', $user_id);
        $update = $this->db->update('users', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {
        $user_id = $this->delete('user_id');
        $this->db->where('user_id', $user_id);
        $delete = $this->db->delete('users');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            redirect('admin/users','refesh');
        } else {
            $this->response(array('status' => 'fail', 502));
            redirect('admin/users','refesh');
        }
    }


    //Masukan function selanjutnya disini
}
?>