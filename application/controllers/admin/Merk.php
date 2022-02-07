<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Merk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->API="http://localhost/wadas/index.php";
        $this->load->model("m_merk");
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
        $result = $this->curl->simple_get($this->API.'/merk');
        $conresult = json_decode($result);
        $data['merk'] = $conresult->merk;
        $this->load->view("admin/merk/list", $data);
    }

    public function add()
    {
        $this->load->view("admin/merk/new_form");
    }


    public function edit($id_merk_barang)
    {

        $kondisi = array('id_merk_barang' => $id_merk_barang );
        $data['data'] = $this->m_merk->get_by_id($kondisi);
        return $this->load->view('admin/merk/edit_form',$data);
    }


    public function updatemerk()
    {
        $link = $this->uri->uri_string;
        if(isset($_POST['submit'])){
            $data = array(
                        'id_merk_barang'          => $this->input->post('id_merk_barang'),
                        'merk'    => $this->input->post('merk'));
            $insert =  $this->curl->simple_put($this->API.'/merk', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('update', 'Data Berhasil Diubah');
                redirect('admin/merk','refesh');
            }else
            {
               $this->session->set_flashdata('update','Update Data Gagal');
               redirect('admin/merk','refesh');
            }
        }

    }

    function delete($id_merk_barang){
        if(empty($id_merk_barang)){
            redirect('admin/merk','refesh');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/merk', array('id_merk_barang'=>$id_merk_barang), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('admin/merk','refesh');
        }
    }
}
