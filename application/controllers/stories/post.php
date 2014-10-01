<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

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

	public function story()
	{
		$this->load->view('story/new_story');
	}
}