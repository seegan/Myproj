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
	$r_data['result'] = false;

	$action = $data['action'];
	$client_id = $data['client_id'];
	$table = 'pl_user';
	$condition = array('user_id'=>$client_id);

	$CI = & get_instance();

	//For Client account approve
	if($action == 'admin_client_approve')
	{
		$data_val = array('acc_active'=>1);
		$result = $CI->user_model->updateData($table,$data_val,$condition);
		if($result!=0)
		{
			$r_data['result'] = true;
		}

	}

	if($action == 'admin_client_disapprove')
	{
		$data_val = array('acc_active'=>0);
		$result = $CI->user_model->updateData($table,$data_val,$condition);
		if($result!=0)
		{
			$r_data['result'] = true;
		}
	}


	$r_data['total_clients'] 			= totalCount($table='pl_user',$condition=array('role_id'=>2,'is_active'=>1));
	$r_data['total_pending_clients'] 	= totalCount($table='pl_user',$condition=array('role_id'=>2,'acc_active'=>0,'is_active'=>1));
	$r_data['total_approved_clients'] 	= totalCount($table='pl_user',$condition=array('role_id'=>2,'acc_active'=>1,'is_active'=>1));
	

	echo json_encode($r_data);
}