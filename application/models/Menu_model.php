<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class Menu_model extends MY_Model
{
    public $data_file = 'menus';
    public $key_field = 'id';
    public function __construct()
    {
        parent::__construct();
    }

    public $rules = array(
        'insert' => array(
            'title' => array('field'=>'title','label'=>'Title','rules'=>'trim|required')
        ),
        'update' => array(
            'title' => array('field'=>'title','label'=>'Title','rules'=>'trim|required'),
            'menu_id' => array('field'=>'menu_id', 'label'=>'ID', 'rules'=>'trim|is_natural|required')
        )
    );

    public function get_all()
    {
        return $this->_data;
    }






}
/* End of file '/User_model.php' */
/* Location: ./application/models//User_model.php */