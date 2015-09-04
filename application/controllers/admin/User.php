<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends Public_Controller
{
	public function __construct()
	{
        parent::__construct();
	}
	
	public function index()
	{

	}
		
	public function login()
	{
        if(isset($_SESSION['logged_in']))
        {
            $this->logout();
            exit;
        }
        $this->load->model('user_model');
        $users = $this->user_model->get_all();
        if(empty($users))
        {
            redirect('admin/user/register');
        }
	}

    public function register()
    {
        $this->data['message'] = 'You need at least one user for our relationship to work... So why not register?';
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $users = $this->user_model->get_all();
        if(!empty($users))
        {
            redirect('admin');
            exit;
        }
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('email','Email','trim|valid_email|required');
        $this->form_validation->set_rules('password','Password','trim|min_length[6]|required');
        if($this->form_validation->run()===FALSE)
        {
            $this->render('users/register_view');
        }
        else
        {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            if($this->user_model->register($username,$email,$password))
            {
                redirect('admin');
            }
            else
            {
                show_error('An error occurred...');
            }
        }

    }

    public function logout()
    {
        unset($_SESSION['logged_in']);
        session_destroy();
        redirect('admin');
    }
}
/* End of file 'admin/User.php' */
/* Location: ./application/controllers/admin/User.php */