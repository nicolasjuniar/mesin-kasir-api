<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function getUser($user)
    {
        $this->db->select('user.id,user.name,user.username,role.role')
            ->from('tbl_user user')
            ->join('tbl_role role', 'user.id_role = role.id')
            ->where('user.username', $user['username'])
            ->where('user.password', $user['password']);
        return $this->db->get('')->row_array();
    }

    public function getAllUser()
    {
        $this->db->select('user.id,user.name,user.username,role.role')
            ->from('tbl_user user')
            ->join('tbl_role role', 'user.id_role = role.id');
        return $this->db->get('')->row_array();
     }
}
