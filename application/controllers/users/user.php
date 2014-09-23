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
					$this->form_validation->set_rules('username', 'User Name', 'required');
					$this->form_validation->set_rules('password', 'Password', 'required');
					$this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|matches[password]');
					
					if ($this->form_validation->run() == FALSE)
					{
						$this->load->view('registration');
					}
					else
					{
						var_dump("validate true");
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
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */