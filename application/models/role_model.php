<?php defined('BASEPATH') OR exit('No direct script access allowed');

class role_model extends CI_Model
{
    private $_table = "stg_role";

    public $stg_role_id;
    public $role_code;
    public $role_name;

    public function rules()
    {
        return [
            ['field' => 'role_code',
            'label' => 'Role Code',
            'rules' => 'required'],

            ['field' => 'role_name',
            'label' => 'Role Name',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["stg_role_id" => $id])->row();
    }

    public function getByCode($code)
    {
        return $this->db->get_where($this->_table, ["role_code" => $code])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        //$this->topic_id = uniqid();
        $this->role_code = $post["role_code"];
        $this->role_name = $post["role_name"];

        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->stg_role_id = $post["stg_role_id"];
        $this->role_code = $post["role_code"];
        $this->role_name = $post["role_name"];

        $this->db->update($this->_table, $this, array('stg_role_id' => $post['stg_role_id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("stg_role_id" => $id));
    }
}