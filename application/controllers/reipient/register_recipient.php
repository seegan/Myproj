<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register_recipient extends MY_Controller {
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
	   getCurrentAccountStatus($role_id = array(1,2,3,4));
	}

	public function post_recipient()
	{
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('mname', 'Middle Name', 'trim|xss_clean');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|xss_clean');
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|numeric|required|xss_clean');
		$this->form_validation->set_rules('refnum', 'Reference Number', 'trim|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[pl_user.email]|is_unique[pl_recipients.email]|xss_clean');
		$this->form_validation->set_rules('location', 'Location', 'trim|required|xss_clean');
		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$lname = $this->input->post('lname');
		$phone = $this->input->post('phone');
		$refnum = $this->input->post('refnum');
		$email = $this->input->post('email');
		$gender = $this->input->post('gender');
		$location = $this->input->post('location');

		if(getCurrentUserSession())
		{
			$user_session = getCurrentUserSession();
            $ref_id = $user_session['user_id'];

            $user = getUserDetailByUserId($ref_id);
			if($user)
			{
				$user = $user->row();
				$client_id = getClientIdOfUserByRoleAndUserId($user->user_id, $user->role_id, $user->ref_id);
			}
			else
			{
				die("User not found register_recipient.php");
			}
            
		}
		else
		{
			die("User Not Loggedin register_recipient.php");
		}
		

		if($this->form_validation->run() == FALSE)
		{
			$this->load->helper('form');
			$data['title']='Create Recipients';
			$data['content'] ='reipient/create_recipients';
			$this->load->view($this->layout_transaction_initiator,$data);  
		}
		else
		{
			$recip_data=array(
				'first_name' => $fname,
				'middle_name' => $mname,
				'last_name' => $lname,
				'gender' => $gender,
				'phone' => $phone,
				'ref_num' => $refnum,
				'email' => $email,
				'location' => $location,
				'ref_id' => $ref_id,
				'client_id' => $client_id
				);
			$last_insert_id = registerRecipientData($recip_data);
			if($last_insert_id)
			{
				redirect('reipient/create');
			}
			else
			{
				$data['msg'] = "Recipient Not Added try Again";
				$data['title']='Status Info';
				$data['content'] ='client/status';
				$this->load->view('layouts/status_master',$data);  
			}
			
		}
	}


	public function update_recipient()
	{
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('mname', 'Middle Name', 'trim|xss_clean');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|xss_clean');
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|numeric|required|xss_clean');
		$this->form_validation->set_rules('refnum', 'Reference Number', 'trim|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('location', 'Location', 'trim|required|xss_clean');
		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$lname = $this->input->post('lname');
		$phone = $this->input->post('phone');
		$refnum = $this->input->post('refnum');
		$email = $this->input->post('email');
		$gender = $this->input->post('gender');
		$location = $this->input->post('location');
		//$ref_id = $this->input->post('user_id');
		if(getCurrentUserSession())
		{
			$user_session = getCurrentUserSession();
            $ref_id = $user_session['user_id'];
		}
		else
		{
			die("User Not Loggedin register_recipient.php");
		}

		$recip_id = $this->input->post('recip_id');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->helper('form');
			$data['recipient_id'] = $recip_id;
			$data['title']='Create Recipients';
			$data['content'] ='reipient/edit_recipient';
			$this->load->view($this->layout_transaction_initiator,$data);  
		}
		else
		{
			$recip_data=array(
				'first_name' => $fname,
				'middle_name' => $mname,
				'last_name' => $lname,
				'gender' => $gender,
				'phone' => $phone,
				'ref_num' => $refnum,
				'email' => $email,
				'location' => $location,
				'ref_id' => $ref_id
				);
			$last_insert_id=updateRecipientData($recip_data,$recip_id);
			if($last_insert_id)
			{
				$this->session->set_flashdata('item', 'One Record Updated');
				redirect('reipient/manage');
			}
			else
			{
				$data['msg'] = "Recipient Not Added try Again";
				$data['title']='Status Info';
				$data['content'] ='client/status';
				$this->load->view('layouts/status_master',$data);  
			}
			
		}
	}


	
}