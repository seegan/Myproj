<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_home extends MY_Controller {
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
	   getCurrentAccountStatus($role_id = array(1))
	}
	
	public function index()
	{

			$data['title']='Dashboard';
			$data['content']='super_admin/admin_home';
			$this->load->view($this->layout_role,$data);
		
	}
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		redirect('super_admin/admin_login', 'refresh');
	}
}