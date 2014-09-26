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

	function siteStatus()
	{

		$data['allow_registration'] = TRUE;
		$data['registration_denny_msg'] = 'New Users Not Allowed to register now!';

		//Registered users status active/deactive
		$data['allow_register_active'] = 1;


		$data['allow_login'] = TRUE;
		$data['login_denny_msg'] = 'Login not allowed now!';

		return $data;
	}


	function getCurrentUser($return='')
	{
		$data['user_name'] = 'Suji';
		$data['logged_in'] = FALSE;

		return $data;
	}
