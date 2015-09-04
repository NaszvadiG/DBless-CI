<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Offline extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
        $this->render('offline_view');
	}
}
/* End of file '/Offline.php' */
/* Location: ./application/controllers//Offline.php.php */