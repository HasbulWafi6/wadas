<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->API="http://localhost/wadas/index.php";
        $this->load->model("m_perusahaan");
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
        $result = $this->curl->simple_get($this->API.'/perusahaan');
        $conresult = json_decode($result);
        $data['perusahaan'] = $conresult->perusahaan;
        $this->load->view("admin/perusahaan/list", $data);
    }

    public function add()
    {
        $this->load->view("admin/perusahaan/new_form");
    }


    public function edit($id_perusahaan)
    {

        $kondisi = array('id_perusahaan' => $id_perusahaan );
        $data['data'] = $this->m_perusahaan->get_by_id($kondisi);
        return $this->load->view('admin/perusahaan/edit_form',$data);
    }


    public function updateperusahaan()
    {
        $link = $this->uri->uri_string;
        if(isset($_POST['submit'])){
            $data = array(
                'id_perusahaan'       =>  $this->input->post('id_perusahaan'),
                'nama'=>  $this->input->post('nama'),
                'alamat'=>  $this->input->post('alamat'),
                'telp'=>  $this->input->post('telp'));
            $insert =  $this->curl->simple_put($this->API.'/perusahaan', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('update', 'Data Berhasil Diubah');
                redirect('admin/perusahaan','refesh');
            }else
            {
               $this->session->set_flashdata('update','Update Data Gagal');
               redirect('admin/perusahaan','refesh');
            }
        }

    }

    function delete($id_perusahaan){
        if(empty($id_perusahaan)){
            redirect('admin/perusahaan','refesh');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/perusahaan', array('id_perusahaan'=>$id_perusahaan), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('admin/perusahaan','refesh');
        }
    }
}
