<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->API="http://localhost/wadas/index.php";
        $this->load->model("m_item");
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
        $result = $this->curl->simple_get($this->API.'/items');
        $conresult = json_decode($result);
        $data['items'] = $conresult->item;
        $this->load->view("admin/items/list", $data);
    }

    public function add()
    {
        $rd['kategori'] = $this->m_item->get_kategori();
        $rd['merk'] = $this->m_item->get_merk();
        $this->load->view("admin/items/new_form", $rd);
    }


    public function edit($id_barang)
    {

        $kondisi = array('id_barang' => $id_barang );
        $data['data'] = $this->m_item->get_by_id($kondisi);
        $data['kategori'] = $this->m_item->get_kategori();
        $data['merk'] = $this->m_item->get_merk();
        return $this->load->view('admin/items/edit_form',$data);
    }


    public function updateitem()
    {
        $link = $this->uri->uri_string;
        if(isset($_POST['submit'])){
            $data = array(
                        'id_barang'          => $this->input->post('id_barang'),
                        'kode_barang'          => $this->input->post('kode_barang'),
                        'nama_barang'          => $this->input->post('nama_barang'),
                        'total_stok'          => $this->input->post('total_stok'),
                        'harga'          => $this->input->post('harga'),
                        'id_kategori_barang'          => $this->input->post('id_kategori_barang'),
                        'id_merk_barang'          => $this->input->post('id_merk_barang'),
                        'keterangan'    => $this->input->post('keterangan'));
            $insert =  $this->curl->simple_put($this->API.'/items', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('update', 'Data Berhasil Diubah');
                redirect('admin/items','refesh');
            }else
            {
               $this->session->set_flashdata('update','Update Data Gagal');
               redirect('admin/items','refesh');
            }
        }

    }

    function delete($id_barang){
        if(empty($id_barang)){
            redirect('admin/items','refesh');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/items', array('id_barang'=>$id_barang), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('admin/items','refesh');
        }
    }
}
