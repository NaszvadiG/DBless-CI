<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class Menu_item_model extends MY_Model
{
    public $data_file = 'menu_items';
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

    public function get_all($menu_id = NULL)
    {
        if(!isset($menu_id)) {
            return $this->_data;
        }
        else
        {
            print_r($this->_data);
        }
    }






}
/* End of file '/User_model.php' */
/* Location: ./application/models//User_model.php */