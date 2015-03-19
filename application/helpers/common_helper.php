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
function getAllClientList()
{
	$CI =& get_instance();
	$CI->load->model('user_model');
	$condition=array(
		'acc_id'
		)
	$user_id = $CI->user_model->selectData($table="pl_user",'',);
}
	