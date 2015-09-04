<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class Banned_model extends MY_Model
{
    public $data_file = 'banned';
    public $encrypted = TRUE;
    public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all()
	{
		return $this->_data;
	}
}
/* End of file '/Banned_model.php' */
/* Location: ./application/models//Banned_model.php */