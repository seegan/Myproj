<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manageusers extends MY_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
	   parent::__construct();
	   $this->load->model(array('admin_model','user_model'));
	   getCurrentAccountStatus($role_id = array(1,2));
	}
	
	public function manage($role_id)
	{
		if ( !in_array($role_id,array(3,4,5,6,7)) )	
		{
			$data['msg'] = "Wrong Url please check the url";
			$data['title']='Status Info';
			$data['content'] ='client/status';
			$this->load->view('layouts/status_master',$data);  
		}
		else
		{
			$data['role_id'] = $role_id;
			$data['title']='Manage Users';
			$data['content']='client/manage_users';
			$this->load->view($this->layout_client,$data);
		}
	}
}