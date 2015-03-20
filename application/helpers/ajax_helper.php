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

function admin_client_action($data)
{

	$action = $data['action'];
	$client_id = $data['client_id'];
	$table = 'pl_user';
	$condition = array('user_id'=>$client_id);

	$CI = & get_instance();

	//For Client account approve
	if($action == 'admin_client_approve')
	{
		$data = array('acc_active'=>1);
		$data = $CI->user_model->updateData($table,$data,$condition);
		var_dump($data); die();
	}

	if($action == 'admin_client_disapprove')
	{
		$data = array('acc_active'=>0);
		$data = $CI->user_model->updateData($table,$data,$condition);
		var_dump($data); die();		
	}
}