<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model
{
    public $data_file = NULL;
    public $encrypted = FALSE;
    protected $_data = array();
    public function __construct()
    {
        $this->check_data_file();
    }

    public function check_data_file()
    {
        if(isset($this->data_file))
        {
            $file_location = APPPATH.'data/'.$this->data_file.'.txt';
            if(file_exists($file_location))
            {
                $data = file_get_contents($file_location);
                $this->_data = unserialize($data);
            }
            else
            {
                fopen($file_location,'w');

            }
            echo '<pre>';
            print_r($this->_data);
            echo '</pre>';
        }
        return TRUE;
    }
}