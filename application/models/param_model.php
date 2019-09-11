<?php defined('BASEPATH') OR exit('No direct script access allowed');

class param_model extends CI_Model
{
    private $_table = "stg_param";

    public $stg_param_id;
    public $param_type;
    public $param_value;
    public $param_name;

    public function rules()
    {
        return [
            ['field' => 'param_type',
            'label' => 'Parameter Type',
            'rules' => 'required'],

            ['field' => 'param_value',
            'label' => 'Parameter Code',
            'rules' => 'required'],

            ['field' => 'param_name',
            'label' => 'Parameter Name',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["stg_param_id" => $id])->row();
    }

    public function getByType($type)
    {
        return $this->db->get_where($this->_table, ["param_type" => $type])->row();
    }

    public function getByCode($code)
    {
        return $this->db->get_where($this->_table, ["param_value" => $code])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        //$this->topic_id = uniqid();
        $this->param_type = $post["param_type"];
        $this->param_value = $post["param_value"];
        $this->param_name = $post["param_name"];

        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->stg_param_id = $post["stg_param_id"];
        $this->param_type = $post["param_type"];
        $this->param_value = $post["param_value"];
        $this->param_name = $post["param_name"];

        $this->db->update($this->_table, $this, array('stg_param_id' => $post['stg_param_id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("stg_param_id" => $id));
    }
}