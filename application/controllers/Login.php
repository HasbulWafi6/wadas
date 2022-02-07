<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library('form_validation');
        // $this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        $this->load->view('login_page'); 
    }

    function auth(){
        $username    = $this->input->post('username',TRUE);
        $password = password_verify($this->input->post('password',TRUE));
        $validate = $this->user_model->doLogin($username,$password);
        if($validate->num_rows() > 0){
            $data  = $validate->row_array();
            $user_id  = $data['user_id'];
            $username  = $data['username'];
            $email = $data['email'];
            $full_name = $data['full_name'];
            $role = $data['role'];
            $photo = $data['photo'];
            $sesdata = array(
                'user_id'  => $user_id,
                'username'  => $username,
                'email'     => $email,
                'full_name'  => $full_name,
                'role'     => $role,
                'photo'     => $photo,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sesdata);
            // access login for admin
            if($role === 'admin'){
                redirect(site_url('admin'));

            
            }
        }
        else{
            echo $this->session->set_flashdata('msg','Username or Password is Wrong');
            redirect('login');
        }
 
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }

    public function test()
    {
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('foo' => 'bar')));
    }
}
