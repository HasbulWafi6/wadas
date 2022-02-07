<?php

class M_merk extends CI_Model
{
    private $_table = "pj_merk_barang";

    public $id_merk_barang;
    public $merk;


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
     public function get_by_id($kondisi)
      {
          $this->db->from('pj_merk_barang');
          $this->db->where($kondisi);
          $query = $this->db->get();
          return $query->row();
      }

     
}
