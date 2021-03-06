<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_home extends MY_Controller {
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
		$this->load->model('user_model');
		getCurrentAccountStatus($role_id = array(1,2));
	}

	public function index()
	{


			if($this->session->userdata('user_logged_in'))
	  		{
	  			$this->load->helper('form');
				$session_data = $this->session->userdata('user_logged_in');
		     	$data['email'] = $session_data['email'];
				$data['title']='Dashboard';
				$data['content']='client/client_home';
				$this->load->view($this->layout_client,$data);
			}
			else
		   	{
		    	redirect('client/user/login');
		   	}
		
	}

	public function logout()
	{
		$this->session->unset_userdata('user_logged_in');
		redirect('client/user/login');
	}
}