<?php defined('BASEPATH') OR exit('No direct script access allowed');

class topic_model extends CI_Model
{
    private $_table = "topic";

    public $topic_id;
    public $topic_title;
    public $topic_desc;
    public $usr_crt;

    public function rules()
    {
        return [
            ['field' => 'topic_title',
            'label' => 'Title',
            'rules' => 'required'],

            ['field' => 'topic_desc',
            'label' => 'Description',
            'rules' => 'required'],
            
            ['field' => 'usr_crt',
            'label' => 'user',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["topic_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        //$this->topic_id = uniqid();
        $this->topic_title = $post["topic_title"];
        $this->topic_desc = $post["topic_desc"];
        $this->usr_crt = $post["usr_crt"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->topic_id = $post["topic_id"];
        $this->topic_title = $post["topic_title"];
        $this->topic_desc = $post["topic_desc"];
        $this->usr_crt = $post["usr_crt"];
        $this->db->update($this->_table, $this, array('topic_id' => $post['topic_id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("topic_id" => $id));
    }
}