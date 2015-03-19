<?php 
class MY_Controller extends CI_Controller
{
	public $layout;
	public $layout_role;
	public $layout_client;
	public function __construct()
	{
		parent::__construct();
		$this->layout='layouts/master';
		$this->layout_role='layouts/admin_master';
		$this->layout_client='layouts/client_master';

	}

}
?>