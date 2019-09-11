<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("role_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["roles"] = $this->role_model->getAll();
        $this->load->view("admin/settings/role/role_list", $data);
    }

    public function add()
    {
        $role = $this->role_model;
        $validation = $this->form_validation;
        $validation->set_rules($role->rules());

        if ($validation->run()) {
            $role->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/settings/role/role_add");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/settings/role/');
       
        $role = $this->role_model;
        $validation = $this->form_validation;
        $validation->set_rules($role->rules());

        if ($validation->run()) {
            $role->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/settings/role/'));
        }

        $data["role"] = $role->getById($id);
        if (!$data["role"]) show_404();
        
        $this->load->view("admin/settings/role/role_edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->role_model->delete($id)) {
            redirect(site_url('admin/settings/role/'));
        }
    }
}