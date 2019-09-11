<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Parameter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("param_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["params"] = $this->param_model->getAll();
        $this->load->view("admin/settings/parameter/param_list", $data);
    }

    public function add()
    {
        $param = $this->param_model;
        $validation = $this->form_validation;
        $validation->set_rules($param->rules());

        if ($validation->run()) {
            $param->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/settings/parameter/param_add");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/settings/parameter/');
       
        $param = $this->param_model;
        $validation = $this->form_validation;
        $validation->set_rules($param->rules());

        if ($validation->run()) {
            $param->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/settings/parameter/'));
        }

        $data["param"] = $param->getById($id);
        if (!$data["param"]) show_404();
        
        $this->load->view("admin/settings/parameter/param_edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->param_model->delete($id)) {
            redirect(site_url('admin/settings/parameter/'));
        }
    }
}