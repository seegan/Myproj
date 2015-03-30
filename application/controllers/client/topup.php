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
	   getCurrentAccountStatus($role_id = array(2));
	}

	public function index()
	{
		$session_data = $this->session->userdata('user_logged_in');
	    $user_id = $session_data['user_id'];
	    $this->load->library('form_validation');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|is_numeric|required|xss_clean|callback_amountchk');
		$amount = $this->input->post('amount');
		if($this->form_validation->run() == FALSE)
		{
			$data['title']='Dashboard';
			$data['content']='client/client_home';
			$this->load->view($this->layout_client,$data);
		}
		else
		{
			$topup_data=array(
				'user_id' => $user_id,
				'topup_amount'  => $amount,
				'is_active' => 0
				);
			$topup_id=topupClientData($topup_data);
			if($topup_id){
				redirect('client/client_home');
				return "topup sucess";
			}
			else
			{
				return "topup unsuccess";
			}
			
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