<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("user_model");
		if($this->session->userdata('logged_in') !== TRUE){
	      redirect('login');
	    }
	}

	public function index()
	{
        // load view admin/overview.php
        $rd['total_user'] = $this->user_model->tampil_user();
        $rd['total_perusahaan'] = $this->user_model->tampil_perusahaan();
        $rd['jumlah_harian'] = $this->user_model->tampil_order_harian();
        $this->load->view("admin/overview",$rd);
	}
}
