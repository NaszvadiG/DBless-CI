<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends MY_Model
{
    public $data_file = 'users';
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        return $this->_data;
    }

    public function register($username, $email, $password)
    {
        $users = $this->_data;
        if(!empty($users) && !isset($_SESSION['logged_in']))
        {
            redirect('admin');
            exit;
        }
        if(!array_key_exists($email,$users))
        {
            $password = hash('sha256',$password);
            $this->_data[$email] = array('username'=>$username,'email'=>$email,'password'=>$password);
            if($this->save_all_data())
            {
                $_SESSION['logged_in'] = $username;
                $_SESSION['email'] = $email;
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            show_error('The email is already used by another user');
        }

    }
}
/* End of file '/User_model.php' */
/* Location: ./application/models//User_model.php */