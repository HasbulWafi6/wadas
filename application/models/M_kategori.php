<?php

class M_kategori extends CI_Model
{
    private $_table = "pj_kategori_barang";

    public $id_kategori_barang;
    public $kategori;


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
     public function get_by_id($kondisi)
      {
          $this->db->from('pj_kategori_barang');
          $this->db->where($kondisi);
          $query = $this->db->get();
          return $query->row();
      }

     
}
