<?php

class User_model extends CI_Model
{
    private $_table = "users";

    public $user_id;
    public $full_name;
    public $password;
    public $email;
    public $role;

    public function rules()
    {
        return [
             ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[3]']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
     public function get_by_id($kondisi)
      {
          $this->db->from('users');
          $this->db->where($kondisi);
          $query = $this->db->get();
          return $query->row();
      }

    public function save($data)
    {
      $this->db->insert('users',$data);
      return TRUE;
    }

    public function update($data,$kondisi)
    {
      $this->db->update('users',$data,$kondisi);
      return TRUE;
    }

    public function delete($where)
  {
      $this->db->where($where);
      $this->db->delete('users');
      return TRUE;
  }

    public function doLogin ($username,$password){
		$this->db->where('username',$username);
        $this->db->where('password',$password);
        $result = $this->db->get('users',1);
        return $result;
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($user_id){
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id={$user_id}";
        $this->db->query($sql);
    }

    public function tampil_user(){
      $this->db->select('COUNT(user_id) as total_user');
       $hasil = $this->db->get('users');
      return $hasil;
    }

     public function tampil_perusahaan(){
      $this->db->select('COUNT(id_perusahaan) as total_perusahaan');
       $hasil = $this->db->get('pj_perusahaan');
      return $hasil;
    }


     public function tampil_order_harian(){
      $this->db->select('tanggal,COUNT(*) as jumlah_harian');
      $this->db->where('tanggal',date('Y-m-d'));
      $hasil = $this->db->get('pj_penjualan_master');
      return $hasil;
    }

}
