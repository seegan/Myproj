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
		$session = getUserSession();
		if($session)
		{
			return $session;
		}
		else
		{
			$data['logged_in'] = FALSE;
			return $data;
		}
	}

	function setUserLoginSession($user_id='', $user_name='')
	{
		$CI =& get_instance();

		$CI->session->unset_userdata(array(
                                'logged_in',
                                'rb_UserId',
                                'user_name',
                                'rb_roles'));

		$CI->session->set_userdata(array(
                                'logged_in' => TRUE,
                                'rb_UserId' => $user_id,
                                'user_name' => $user_name,
                                'rb_roles' => 'user'));
	}

	function getUserSession()
	{
		$CI =& get_instance();

		$login = $CI->session->userdata('logged_in');
		if($login)
		{
			return $CI->session->userdata;
		}
		else
		{
			return false;
		}

	}

	function userLogout()
	{
		$CI =& get_instance();

		$CI->session->sess_destroy();
	}


	function crawl_site_list($cond)
	{
  		$CI =& get_instance();

	    $sites = $CI->common_model->selectData($table="copy_sites",$selectData=array('id','url'),$cond);
	    return $sites->result();
	}


	function get_crawl_story_url($id,$limit)
	{
		$CI =& get_instance();
		$cond = array('site_id'=>$id,'can_crawl'=>1,'wes_crawled'=>0,'crawl_error'=>0,);
	    $urls = $CI->common_model->selectData($table="copy_sites_story_url",$selectData=array('id','url'),$cond, $limit);
	    return $urls->result();
	}

	function get_story_from_url($id, $url, $site_id)
	{
		getSource($url);
		$data['title'] = get_title_content();
		$data['story'] = get_story_content();
		return $data;
	}

	function strip_tags_from_story($story='')
	{
		return strip_tags($story, '<p><a><br><img><table><tr><td><th><i><b><u><pre>');
	}