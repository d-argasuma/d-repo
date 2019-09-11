<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("role_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["users"] = $this->user_model->getAll();
        foreach ($data["users"] as $user) 
        {
            $user->role_name = $this->role_model->getByCode($user->role_code)->role_name;
        }
       
        $this->load->view("admin/user/user_list", $data);
    }

    public function add()
    {
        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());
        $data["roles"] = $this->role_model->getAll();

        if ($validation->run()) {
            $user->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/user/user_add",$data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/user/');
       
        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/user/'));
        }

        $data["user"] = $user->getById($id);
        $data["roles"] = $this->role_model->getAll();
        if (!$data["user"]) show_404();
        
        $this->load->view("admin/user/user_edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->user_model->delete($id)) {
            redirect(site_url('admin/user/'));
        }
    }
}