<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

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
		$this->layout="Yes";

		$this->user = getCurrentUser();
		$this->siteStatus = siteStatus();

		$this->load->library('form_validation');
		$this->load->helper('user');
		$this->load->model('common_model');

$login = $this->session->userdata;
var_dump($login);


	}

	public function index()
	{
		$this->title = "seegan";
		$this->load->view('home');
	}

	public function register()
	{

		if($this->user['logged_in']!=true)
		{
			if ($_SERVER['REQUEST_METHOD'] === 'POST') 
			{
				if( $this->siteStatus['allow_registration'] )
				{
					$display_name = $this->input->post('name',TRUE);
					$user_name = $this->input->post('username', TRUE);
					$password = $this->input->post('password');
					$re_password = $this->input->post('repassword');

					$this->form_validation->set_rules('name', 'Display Name', 'required');
					$this->form_validation->set_rules('username', 'User Name', 'required|min_length[5]|max_length[12]|is_unique[ring_users.user_login]');
					$this->form_validation->set_rules('password', 'Password', 'required');
					$this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|matches[password]');
					
					if ($this->form_validation->run() == FALSE)
					{
						$this->load->view('registration');
					}
					else
					{
						$can_register = allowRegister($user_name,$password,$re_password);
						if($can_register)
						{
							$register_status = userRegister(array('user_login' => $user_name, 'user_pass' => md5($password), 'display_name' => $display_name , 'user_registered' => date("d-m-Y H:i:s"), 'user_status' => $this->siteStatus['allow_register_active']  ) );
							if($register_status)
							{
								$this->session->set_flashdata('success', 'Account Created!');
								redirect('/');
							}
							else
							{
								$this->session->set_flashdata('error', 'Account creation Failed! Please try again!');
								redirect('user/register');
							}
						}
						else
						{
							$this->session->set_flashdata('error', 'Username already exist! Or Invalid password method!');
							redirect('user/register');
						}
					}
				}
				else
				{
					$this->session->set_flashdata('info', $this->siteStatus['registration_denny_msg']);
					redirect('user/register');
				}
			}
			else
			{
				$this->load->view('registration');
			}			
		}
		else
		{
			$this->session->set_flashdata('error', 'You are already registered!');
			redirect('/');
		}

	}


	public function login()
	{
		if($this->user['logged_in']!=true)
		{
			if ($_SERVER['REQUEST_METHOD'] === 'POST') 
			{
				if( $this->siteStatus['allow_login'] )
				{
					$user_name = $this->input->post('username', TRUE);
					$password = $this->input->post('password');

					$this->form_validation->set_rules('username', 'User Name', 'required');
					$this->form_validation->set_rules('password', 'Password', 'required');
					
					if ($this->form_validation->run() == FALSE)
					{
						$this->load->view('login');
					}
					else
					{
						$user_id = allowLogin($user_name,$password);
						if($user_id)
						{
							setUserLoginSession($user_id, $user_name);

							$this->session->set_flashdata('success', 'Loggedin Successfully!');
							redirect('/');
						}
						else
						{
							$this->session->set_flashdata('error', 'Invalid User name or Password!');
							redirect('user/login');
						}
					}
				}
				else
				{
					$this->session->set_flashdata('info', $this->siteStatus['login_denny_msg']);
					redirect('user/login');
				}
			}
			else
			{
				$this->load->view('login');
			}			
		}
		else
		{
			$this->session->set_flashdata('error', 'You are already loggedin!');
			redirect('/');
		}
	}
	

	public function logout()
	{
		userLogout();

		$this->session->set_flashdata('success', 'You are Loggedout!');
		redirect('/');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */