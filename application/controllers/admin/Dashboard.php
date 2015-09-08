<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->render('admin/dashboard_view');
	}
}
/* End of file 'admin/Dashboard.php' */
/* Location: ./application/controllers/admin/Dashboard.php */