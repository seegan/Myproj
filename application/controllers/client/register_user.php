<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register_user extends MY_Controller {
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

	 public function post_register()
	{
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cl_type','User Type','trim|is_natural_no_zero|required|max_length[1]|callback_isCheckUserType');
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[pl_user.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$email = $this->input->post('email');
		$pass = MD5($this->input->post('password'));
		$role_id = $this->input->post('cl_type');
		$user_id = $this->input->post('user_id');
		if($this->form_validation->run() == FALSE)
		{
			$data['title']='Create Users';
			$data['content']='client/create_users';
			$this->load->view($this->layout_client,$data);
		}
		else
		{
			$user_data=array(
				'email' => $email,
				'password'  => $pass,
				'role_id' => $role_id,
				'acc_id'  => 0,
				'ref_id' => $user_id,
				'acc_active' => 1,
				'is_active' => 1
				);
			$meta_user_id=registerUserData($user_data);
			$meta_fname=array(
				'user_id' => $meta_user_id,
				'meta_key' => 'first_name',
				'meta_value' => $fname);
			$meta_lname=array(
				'user_id' => $meta_user_id,
				'meta_key' => 'last_name',
				'meta_value' => $lname);
			setUserMeta($meta_fname);
			setUserMeta($meta_lname);
			redirect('client/createusers');
		}
	}


	function isCheckUserType()
	{
		if ( !in_array($this->input->post('cl_type'), $role_id=array(3,4,5,6,7)) )	{
			$this->form_validation->set_message('isCheckUserType', 'Users Type is invalid');  
			return false;
		}
		else
		{
			return true;
		}
	}
}