<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("role_model");
        $this->load->library('form_validation');
	}
	
	public function index()
	{
		if($this->session->userdata('status') != "login"){
			$this->load->view('login');
		}
		else
		{
			redirect(base_url("admin"));
		}
	}
	public function act_login()
	{
		// $this->load->view('about');

		$user = $this->user_model;
		$check = $user->login();
		

		if(!empty($check)){
		
		$data_session = array
		(
    		'username' => $check->username,
			'full_name' => $check->full_name,
		 	'prof_pic' => $check->prof_pic, 			  
		 	'status' => "login"
		);

		$this->session->set_userdata($data_session);
		
		redirect(base_url("admin"));

		}else{
			$this->session->set_flashdata('alert', 'Username atau password salah!');
			redirect(base_url('login'));
		}
	}
	public function act_logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
