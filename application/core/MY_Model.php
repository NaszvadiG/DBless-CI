<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model
{
    public $data_file = NULL;
    public $key_field = 'id';
    public $encrypted = FALSE;
    public $file_location = '';
    protected $_data = array();
    public function __construct()
    {
        $this->check_data_file();
    }

    public function check_data_file()
    {
        if(isset($this->data_file))
        {
            $this->file_location = APPPATH.'data/'.$this->data_file.'.txt';
            if(file_exists($this->file_location))
            {
                $data = file_get_contents($this->file_location);
                $this->_data = unserialize($data);
            }
            else
            {
                $data = '';
                $result = file_put_contents($this->file_location,$data,LOCK_EX);
                if($result!==FALSE)
                {
                    return TRUE;
                }
                show_error('Couldn\'t create data file.');
            }
        }
        return TRUE;
    }

    public function save_all_data()
    {
        $write = serialize($this->_data);
        $result = file_put_contents($this->file_location,$write,LOCK_EX);
        if($result!==FALSE)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function get($row_key)
    {
        if(array_key_exists($row_key,$this->_data))
        {
            return $this->_data[$row_key];
        }
        return FALSE;
    }

    public function insert($data)
    {
        if(array_key_exists($this->key_field,$data) && array_key_exists($data[$this->key_field],$this->_data))
        {
            show_error('You are inserting a key which already exists');
            return FALSE;
        }
        elseif(array_key_exists($this->key_field,$data))
        {
            $this->_data[$data[$this->key_field]] = $data;
            $last_id = $data[$this->key_field];
        }
        else
        {
            for($i=1;$i<=100;$i++)
            {
                if (!isset($this->_data[sizeof($this->_data) + $i])) {
                    $last_id = sizeof($this->_data) + $i;
                    $data[$this->key_field] = $last_id;
                    $this->_data[sizeof($this->_data) + $i] = $data;
                    break;
                }
            }
        }

        if($this->save_all_data()===TRUE) {
            return $last_id;
        }
        return FALSE;
    }

    public function update($new_data,$data_key)
    {
        if(array_key_exists($this->key_field,$new_data))
        {
            $old_data = $this->_data[$data_key];
            foreach($new_data as $key=>$value)
            {
                $old_data[$key]=$value;
            }
            unset($this->_data[$data_key]);
            $this->_data[$old_data[$this->key_field]] = $old_data;
        }
        else {
            foreach ($new_data as $key => $value) {
                $this->_data[$data_key][$key] = $value;
            }
        }
        if($this->save_all_data())
        {
            return TRUE;
        }
        return FALSE;
    }

    public function delete($id = NULL)
    {
        if(!isset($id))
        {
            unlink($this->file_location);
        }
        else
        {
            if(isset($this->_data[$id]))
            {
                unset($this->_data[$id]);
                if($this->save_all_data())
                {
                    return TRUE;
                }
            }
            else
            {
                show_error('Couldn\'t delete data');
            }
        }
    }
}