<?php
Class admin_model extends CI_Model
{
    function login($email, $password)
    {
        $this->db->select('user_id, email, role_id, acc_id');
        $this->db->from('pl_user');
        $this->db->where(array('email'=>$email, 'password'=>MD5($password), 'acc_active'=>1 ,'is_active'=>1));
        $this->db->limit(1);

        $query = $this->db->get();
        if($query->num_rows() == 1)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }
}
?>