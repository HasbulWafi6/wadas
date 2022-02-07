<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->API="http://localhost/wadas/index.php";
        $this->load->model("m_kategori");
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
        $result = $this->curl->simple_get($this->API.'/kategori');
        $conresult = json_decode($result);
        $data['kategori'] = $conresult->kategori;
        $this->load->view("admin/kategori/list", $data);
    }

    public function add()
    {
        $this->load->view("admin/kategori/new_form");
    }


    public function edit($id_kategori_barang)
    {

        $kondisi = array('id_kategori_barang' => $id_kategori_barang );
        $data['data'] = $this->m_kategori->get_by_id($kondisi);
        return $this->load->view('admin/kategori/edit_form',$data);
    }


    public function updatekategori()
    {
        $link = $this->uri->uri_string;
        if(isset($_POST['submit'])){
            $data = array(
                        'id_kategori_barang'          => $this->input->post('id_kategori_barang'),
                        'kategori'    => $this->input->post('kategori'));
            $insert =  $this->curl->simple_put($this->API.'/kategori', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('update', 'Data Berhasil Diubah');
                redirect('admin/kategori','refesh');
            }else
            {
               $this->session->set_flashdata('update','Update Data Gagal');
               redirect('admin/kategori','refesh');
            }
        }

    }

    function delete($id_kategori_barang){
        if(empty($id_kategori_barang)){
            redirect('admin/kategori','refesh');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/kategori', array('id_kategori_barang'=>$id_kategori_barang), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('admin/kategori','refesh');
        }
    }
}
