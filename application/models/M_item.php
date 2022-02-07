<?php

class M_item extends CI_Model
{
    private $_table = "barang";

    public $item_code;
    public $name;
    public $stock;


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
     public function get_by_id($kondisi)
      {
          $this->db->from('pj_barang');
          $this->db->where($kondisi);
          $query = $this->db->get();
          return $query->row();
      }

      public function get_kategori()
      {
          $query = $this->db->query('SELECT * FROM pj_kategori_barang');
          return $query->result();
      }

      public function get_merk()
      {
          $query = $this->db->query('SELECT * FROM pj_merk_barang');
          return $query->result();
      }
     
}
