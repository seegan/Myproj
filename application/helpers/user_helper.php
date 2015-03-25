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
	
	function registerUserData($user_data)
	{
		$CI =& get_instance();
		$CI->load->model('user_model');
		$user_id = $CI->user_model->insertData($table="pl_user",$user_data);
	    return $user_id;
	}

	function setUserMeta($meta_data)
	{
		$CI =& get_instance();
		$CI->load->model('user_model');
		$CI->user_model->insertData($table="pl_usermeta",$meta_data);
		return true;
	}

	function registerRecipientData($recip_data)
	{
		$CI =& get_instance();
		$CI->load->model('user_model');
		$recip_id = $CI->user_model->insertData($table="pl_recipients",$recip_data);
	    return $recip_id;
	}

