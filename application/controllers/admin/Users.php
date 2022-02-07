<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->API="http://localhost/wadas/index.php";
        $this->load->model("user_model");
        $this->load->library('form_validation');
        $this->load->library('curl');
        $this->load->library('upload');
        $this->load->helper('url');
		if($this->session->userdata('logged_in') !== TRUE){
          redirect('login');
        }
    }

    public function index()
    {
        //$coba = $this->form->index_get(); 
        $result = $this->curl->simple_get($this->API.'/users');
        $conresult = json_decode($result);
        $data['users'] = $conresult->user;
        $this->load->view("admin/users/list", $data);
    }

    public function add()
    {
        $rd['role_ot'] = $this->db->role_enum('users','role'); 
        $this->load->view("admin/users/new_form",$rd);
    }


    public function edit($user_id)
    {

        $kondisi = array('user_id' => $user_id );
        $data['role_ot'] = $this->db->role_enum('users','role'); 
        $data['data'] = $this->user_model->get_by_id($kondisi);
        return $this->load->view('admin/users/edit_form',$data);
    }


    public function updateuser()
    {
        $link = $this->uri->uri_string;
        if(isset($_POST['submit'])){
            $data = array(
                'user_id'       =>  $this->input->post('user_id'),
                'username'=>  $this->input->post('username'),
                'password' => $this->input->post('password'),
                'email'=>  $this->input->post('email'),
                'phone'=>  $this->input->post('phone'),
                'role'=>  $this->input->post('role_ot'));
            $insert =  $this->curl->simple_put($this->API.'/users', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('update', 'Data Berhasil Diubah');
                redirect('admin/users','refesh');
            }else
            {
               $this->session->set_flashdata('update','Update Data Gagal');
               redirect('admin/users','refesh');
            }
        }

    }

    function delete($user_id){
        if(empty($user_id)){
            redirect('admin/users','refesh');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/users', array('user_id'=>$user_id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('admin/users','refesh');
        }
    }
}
