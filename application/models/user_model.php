<?php
Class user_model extends CI_Model
{
	function insertData($table,$user_data)
	{
		$this->db->insert($table,$user_data);
		return $this->db->insert_id();
    }

	function updateData($table="",$updateData=array(),$condition=array())
	{
        $this->db->where($condition);
        $this->db->update($table, $updateData); 
	}//End of updateData Function

	function selectData($table="",$selectData=array(),$condition=array(),$limit="")
	{
		if(count($condition)>0)	{	
	 		$this->db->where($condition);
	 	}
	 	if(is_numeric($limit))
	 	{
	 		$this->db->limit($limit);
	 	}

		$this->db->from($table);
	 	$this->db->select($selectData);
		$result = $this->db->get();
		if($result->num_rows()>0)
			return $result;
		else 
			return false;	

	}

    function login($email, $password)
	{
		$this ->db-> select('user_id, email, password, role_id, acc_id');
		$this ->db-> from('pl_user');
		$this ->db-> where('email', $email);
		$this ->db-> where('password',$password);
		$this ->db-> limit(1);
		$query = $this -> db -> get();
		if($query -> num_rows() == 1)
		{
		return $query->result();
		}
		else
		{
		return false;
		}
	}
	function isEmailExist($email) 
	{
	    $this->db->select('user_id');
	    $this->db->where('email', $email);
	    $query = $this->db->get('pl_user');
	    if ($query->num_rows() > 0)
	    {
	        return true;
	    } 
	    else 
	    {
	        return false;
	    }
	}
}
