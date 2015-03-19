<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends MY_Controller {
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
	}
	
	public function index()
	{
		$data['title']='Online Payment';
		$data['content']='pages/home';
		$this->load->view($this->layout_role,$data);
	}
	public function register()
	{
		$this->load->helper(array('form'));
		$data['title']='Register';
		$data['content']='client/user_register';
		$this->load->view($this->layout,$data);
	}
	public function login()
	{
		$this->load->helper(array('form'));
		$data['title']='Login';
		$data['content']='client/user_login';
		$this->load->view($this->layout,$data);
	}
	public function post_register()
	{
		$acc_type	=	$this->input->post('ClientType');
		if($acc_type==0)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('c_name', 'Company Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('c_regnum', 'Company Register Number', 'trim|required|xss_clean');
			$this->form_validation->set_rules('c_email', 'Email', 'trim|required|valid_email|callback_isCompanyEmailExist');
			$this->form_validation->set_rules('c_pass', 'Password', 'trim|required|matches[c_cpass]|md5');
			$this->form_validation->set_rules('c_cpass', 'Password Confirmation', 'trim|required');
			$c_name=$this->input->post('c_name');
			$c_regnum=$this->input->post('c_regnum');
			$c_email=$this->input->post('c_email');
			$c_pass=MD5($this->input->post('c_pass'));
			if($this->form_validation->run() == FALSE)
			{
				$data['title']='Admin Register';
				$data['content']='client/user_register';
				$this->load->view($this->layout,$data);
			}
			else
			{

				$company_data=array(
					'email' => $c_email,
					'password'  => $c_pass,
					'role_id' => 2,
					'acc_id'  =>$acc_type,
					'acc_active' => 0,
					'is_active' => 1,
					);
				$user_id = registerUserData($company_data);
				$meta_cname=array(
					'user_id' => $user_id,
					'meta_key' => 'company_name',
					'meta_value' => $c_name);
				$meta_cregnum=array(
					'user_id' => $user_id,
					'meta_key' => 'company_reg_num',
					'meta_value' => $c_regnum);
				setUserMeta($meta_cname);
				setUserMeta($meta_cregnum);
				redirect('client/user/login');
			}
		}
		else
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('u_fname', 'First Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('u_lname', 'Last Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('u_email', 'Email', 'trim|required|valid_email|callback_isUserEmailExist');
			$this->form_validation->set_rules('u_pass', 'Password', 'trim|required|matches[u_cpass]|md5');
			$this->form_validation->set_rules('u_cpass', 'Password Confirmation', 'trim|required');
			$u_fname=$this->input->post('c_fname');
			$u_lname=$this->input->post('u_lname');
			$u_email=$this->input->post('u_email');
			$u_pass=MD5($this->input->post('u_pass'));
			if($this->form_validation->run() == FALSE)
			{
				$data['title']='Admin Register';
				$data['content']='client/user_register';
				$this->load->view($this->layout,$data);
			}
			else
			{
				$user_data=array(
					'email' => $u_email,
					'password'  => $u_pass,
					'role_id' => 2,
					'acc_id'  =>$acc_type,
					'acc_active' => 0,
					'is_active' => 1
					);
				$user_id=registerUserData($user_data);
				$meta_fname=array(
					'user_id' => $user_id,
					'meta_key' => 'first_name',
					'meta_value' => $u_fname);
				$meta_lname=array(
					'user_id' => $user_id,
					'meta_key' => 'last_name',
					'meta_value' => $u_lname);
				setUserMeta($meta_fname);
				setUserMeta($meta_lname);
				redirect('client/user/login');
			}
		}
	}
	public function isCompanyEmailExist()
	{
		$email=$this->input->post('c_email');
		$this->load->library('form_validation');
		$this->load->model('user_model');
		$is_exist = $this->user_model->isEmailExist($email);

		if ($is_exist) 
		{
			$this->form_validation->set_message('isCompanyEmailExist', 'Email address is already exist.');    
			return false;
		}
		else 
		{
			return true;
		}
	}
	public function isUserEmailExist()
	{
		$email=$this->input->post('c_email');
		$this->load->library('form_validation');
		$this->load->model('user_model');
		$is_exist = $this->user_model->isEmailExist($email);

		if ($is_exist) 
		{
			$this->form_validation->set_message('isUserEmailExist', 'Email address is already exist.');    
			return false;
		}
		else 
		{
			return true;
		}
	}
	public function login_check()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

		if($this->form_validation->run() == FALSE)
		{
			$data['title']='Login';
			$data['content']='client/user_login';
			$this->load->view($this->layout,$data);
		}
		else
		{
			redirect('client/client_home');
		}
	}
	public function check_database()
	{

		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$result = $this->user_model->login($email, $password);

		if($result)
		{
			$sess_array = array();
			foreach($result as $row)
			{
				$sess_array = array(
				'user_id' 		=> $row->user_id,
				'email' 		=> $row->email,
				'role_id' 		=> $row->role_id,
				'account_type' 	=> $row->acc_id
				);
				$this->session->set_userdata('client_logged_in', $sess_array);
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