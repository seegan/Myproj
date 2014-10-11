`<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Website extends CI_Controller {

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
		$this->layout = NULL;

		$this->user = getCurrentUser();
		$this->siteStatus = siteStatus();

		$this->load->library('form_validation');
		$this->load->helper(array('user','superadmin'));
		$this->load->model('common_model');

		$login = $this->session->userdata;



	}

	public function get()
	{

		if(isset($_POST['websitelink']) AND $this->input->post('websitelink'))
		{
			$site = $this->input->post('websitelink');
			$is_source = getSource($site);
			if($is_source)
			{
				get_archive();
			}
			else
			{
				die('Source not avail..');
			}

		}
		$this->load->view('siteadmin/grab/geturl');
	}
}