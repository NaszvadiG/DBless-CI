<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->helper('text');
    }

    public function index()
    {
        $this->render('admin/templates/index_view');
    }

    public function create()
    {

    }
}