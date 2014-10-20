<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

	public function get($str='')
	{
		if ($str=='links') 
		{
			if(isset($_POST['websitelink']) AND $this->input->post('websitelink'))
			{
				$site_id = store_site_url($_POST['websitelink']);

				$site = $this->input->post('websitelink');
				$is_source = getSource($site);
				if($is_source)
				{
					$archive_month_urls = get_archive('full');

	/*var_dump($archive_month_urls);*/

					foreach ($archive_month_urls as $value) {
						getSource($value);
						$status = get_archive('month',$site_id);
						echo $status['status'].'<br>';
					}
					
				}
				else
				{
					die('Source not avail..');
				}

			}
			$this->load->view('siteadmin/grab/geturl');
		}
		if($str=='story')
		{
			if(isset($_POST['range_val']))
			{
				$site_url = $this->input->post('site_url');
				
				/*var_dump($site_url); die();*/
			}
			$this->load->view('siteadmin/grab/site_list.php');
		}
	}
}