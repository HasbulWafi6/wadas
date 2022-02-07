<?php

class M_perusahaan extends CI_Model
{
    private $_table = "pj_perusahaan";

    public $id_perusahaan;
    public $nama;
    public $alamat;
    public $telp;


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
     public function get_by_id($kondisi)
      {
          $this->db->from('pj_perusahaan');
          $this->db->where($kondisi);
          $query = $this->db->get();
          return $query->row();
      }
     
}
