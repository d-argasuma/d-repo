<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Topic extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("topic_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["topics"] = $this->topic_model->getAll();
        $this->load->view("admin/topic/topic_list", $data);
    }

    public function add()
    {
        $topic = $this->topic_model;
        $validation = $this->form_validation;
        $validation->set_rules($topic->rules());

        if ($validation->run()) {
            $topic->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/topic/topic_add");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/topic/');
       
        $topic = $this->topic_model;
        $validation = $this->form_validation;
        $validation->set_rules($topic->rules());

        if ($validation->run()) {
            $topic->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/topic/'));
        }

        $data["topic"] = $topic->getById($id);
        if (!$data["topic"]) show_404();
        
        $this->load->view("admin/topic/topic_edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->topic_model->delete($id)) {
            redirect(site_url('admin/topic/'));
        }
    }
}