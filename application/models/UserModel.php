<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function getUser($user)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('username',$user['username']);
        $this->db->where('password',$user['password']);
        return $this->db->get('')->row_array();
    }
}