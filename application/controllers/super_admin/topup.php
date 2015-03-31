<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Topup extends MY_Controller {
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
	   getCurrentAccountStatus($role_id = array(1));
	}

	public function index()
	{
		$session_data = $this->session->userdata('user_logged_in');
	    $role_id = $session_data['role_id'];
	    $user_id = $session_data['user_id'];
	    if($role_id == 1)
	    {
		    $this->load->library('form_validation');
			$this->form_validation->set_rules('amount', 'Amount', 'trim|is_numeric|required|xss_clean|callback_amountchk');
			$amount = $this->input->post('amount');
			if($this->form_validation->run() == FALSE)
			{
				$data['title'] = 'Dashboard';
				$data['content'] = 'super_admin/admin_home';
				$this->load->view($this->layout_client,$data);
			}
			else
			{
				$topup_data=array(
					'admin_id' => $user_id,
					'topup_amount'  => $amount,
					'topup_status' => 1
					);
				$topup_id=topupAdminData($topup_data);

				if($topup_id){
					redirect('super_admin/admin_home');
					return "topup sucess";
				}
				else
				{
					return "topup unsuccess";
				}
				
			}
		}else
		{
			var_dump("incorrect url");
			die();
		}
	}


	public function amountchk()
	{
		if($this->input->post('amount')<0)
		{
			$this->form_validation->set_message('amount', 'Cant enter lessthan 0');
		}
	}



}