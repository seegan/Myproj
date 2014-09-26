<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Check Whether the user is logged in
 *
 * Create a admin URL based on the admin folder path mentioned in config file. Segments can be passed via the
 * first parameter either as a string or an array.
 *
 * @access	public
 * @param	string
 * @return	string
 */

	function allowRegister($username='',$pass='',$repass='')
	{
		if(md5($pass) === md5($repass))
		{
			return true;
		}
	}
	function allowLogin($username='',$pass='')
	{
		$CI =& get_instance();
		$condition = array('user_login'=>$username, 'user_pass'=>md5($pass), 'user_status'=>1 );
		$select = array('id');
		$user_id = $CI->common_model->selectData($table="ring_users",$select,$condition);
		if($user_id!=false)
		{
			if($user_id->num_rows()==1)
			{
				return $user_id->row('id');
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}

	}

	function userRegister($data=array())
	{
		$CI =& get_instance();

		$user_id = $CI->common_model->insertData($table="ring_users",$data);
		if($user_id)
		{
			return true;
		}
		else
		{
			return false;
		}
	}