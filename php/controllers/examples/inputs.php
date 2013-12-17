<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Inputs extends CI_Controller
{
    public function URI($first, $second)
    {
        echo $first;
        echo $second;
    }

    public function get()
    {
        $first = $this->input->get('first');
        $second = $this->input->get('second');
        echo $first;
        echo $second;
    }

    public function post()
    {
        $first = $this->input->post('first');
        $second = $this->input->post('second');
        echo $first;
        echo $second;
    }
}