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

function getCurrentAccountStatus($role_id = array())
{
	$CI = & get_instance();
	$current_user = $CI->session->userdata('user_logged_in');

	//Check Is there any logged in user (if user not loggedin go to message page)
	if(!$current_user)	{
		var_dump("user not loggedin!"); 
		die();
	}

	$user_role = $current_user['role_id'];
	$user_id = $current_user['user_id'];


	//Check Current user role can access the page or not
	if ( !in_array($user_role, $role_id) )	{
	    var_dump("Current user dont have access to process this page!"); 
	    die();
	}

	//Check Current user account activated or not
	if(!isUserAccountActive($user_id))
	{
		var_dump("Current user account not activated!");
		die();
	}

}

function getAllClients()
{
	$CI = & get_instance();
	$cond = array('role_id'=>2, 'is_active'=>1);
	$sel = array('user_id','email','acc_id','acc_active');
	$data = $CI->user_model->selectData($table="pl_user",$sel,$cond);

	$result = false;
	if($data)
	{
		$result = $data->result();
	}
	return $result;
}














//Getting status

function isUserAccountActive($user_id = '')
{
	$CI = & get_instance();

	$data = false;
	$res = $CI->user_model->selectData( $table="pl_user",$sel = array('user_id'), $con = array('user_id' => $user_id, 'acc_active' => 1 ) );
	if($res)
	{
		$data = true;
	}

	return $data;
}