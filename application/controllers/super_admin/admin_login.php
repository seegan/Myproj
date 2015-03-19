<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_login extends MY_Controller {
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
	   $this->load->model('admin','',TRUE);
	 }
	public function index()
	{
		$this->load->helper(array('form'));
		$data['title']='Admin Login';
		$data['content']='super_admin/admin_login';
		$this->load->view($this->layout,$data);
	}
	public function login_check()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('admin_email', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('admin_pass', 'Password', 'trim|required|xss_clean|callback_check_database');
		if($this->form_validation->run() == FALSE)
		{
			$data['title']='Admin Login';
			$data['content']='super_admin/admin_login';
			$this->load->view($this->layout,$data);
		}
		else
		{
			redirect('super_admin/admin_home', 'refresh');
		}
	}
	public function check_database()
	{
		$email = $this->input->post('admin_email');
		$password = $this->input->post('admin_pass');
		$result = $this->admin->login($email, $password);
		if($result)
		{
			$sess_array = array();
			foreach($result as $row)
			{
				$sess_array = array(
				'user_id' => $row->user_id,
				'email' => $row->email
				);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
