<?php defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model
{
    private $_table = "user";

    public $user_id;
    public $username;
    public $password;
    public $full_name;
    public $email;
    public $prof_pic;
    public $role_code;
    public $role_name;

    public function rules()
    {
        return [
            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required'],
            
            ['field' => 'full_name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required'],

            ['field' => 'role_code',
            'label' => 'Role',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["user_id" => $id])->row();
    }

    public function login()
    {
        $post = $this->input->post();
		$where = array(
		 	'username' => $post["username"],
		 	'password' => $post["password"]
		 	);
        return $this->db->get_where($this->_table,$where)->row();
    }


    public function save()
    {
        
        $post = $this->input->post();
        
        $data = array
        (
            'username' => $post["username"],
            'password' => $post["password"],
            'full_name' => $post["full_name"],
            'email' => $post["email"],
            'prof_pic' => $this->_uploadImage($post["username"]),
            'role_code' => $post["role_code"],

        );

        //$this->topic_id = uniqid();    
        // $this->username = $post["username"];
        // $this->password = $post["password"];
        // $this->full_name = $post["full_name"];
        // $this->email = $post["email"];
        // $this->prof_pic = $this->_uploadImage();
        // $this->role_code = $post["role_code"];


        $this->db->insert($this->_table, $data);
    }

    public function update()
    {
       

        $post = $this->input->post();
        $prof_img = $post["old_prof_pic"];
        
        if (!empty($_FILES["prof_pic"]["name"])) 
        {
            $prof_img = $this->_uploadImage($post["username"]);
        } 
        else
        {
            $prof_img = $post["old_prof_pic"];
        }

        $data = array
        (
            'username' => $post["username"],
            'password' => $post["password"],
            'full_name' => $post["full_name"],
            'email' => $post["email"],
            'prof_pic' => $prof_img,
            'role_code' => $post["role_code"],

        );

        // $this->user_id = $post["user_id"];
        // $this->username = $post["username"];
        // $this->password = $post["password"];
        // $this->full_name = $post["full_name"];
        // $this->email = $post["email"];
        // if (!empty($_FILES["prof_pic"]["name"])) {
        //     $this->prof_pic = $this->_uploadImage();
        // } else {
        //     $this->prof_pic = $post["old_prof_pic"];
        // }
        // $this->role_code = $post["role_code"];

        $this->db->update($this->_table, $data, array('user_id' => $post['user_id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("user_id" => $id));
    }

    private function _uploadImage($nama)
    {
        $config['upload_path']          = './upload/images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $nama;
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('prof_pic')) {
            return $this->upload->data("file_name");
        }
        
        return "default.png";
    }

    private function _deleteImage($id)
    {
        $user = $this->getById($id);
        if ($user->prof_pic != "default.png") {
            $filename = explode(".", $user->prof_pic)[0];
            return array_map('unlink', glob(FCPATH."upload/images/$filename.*"));
        }
    }
}