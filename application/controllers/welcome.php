<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {
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
	public function index()
	{
		$data['title']='Online Payment';
		$data['content']='pages/home';
		$this->load->view($this->layout_role,$data);
	}
	public function user_register()
	{
		$data['title']='Register';
		$data['content']='pages/user_register';
		$this->load->view($this->layout,$data);
	}
	public function user_login()
	{
		$data['title']='Login';
		$data['content']='pages/user_login';
		$this->load->view($this->layout,$data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */