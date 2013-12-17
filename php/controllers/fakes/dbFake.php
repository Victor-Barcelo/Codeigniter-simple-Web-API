<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class DbFake extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTableMetaData()
    {
        echo '{"success":true,"count":2,"data":[
        {"name":"id","type":"int","maxLenght":"11","isPrimaryKey":true},
        {"name":"name","type":"varchar","maxLenght":"255","isPrimaryKey":false}
        ]}';
    }

    public function read()
    {
        echo '{"success":true,"count":1,"data":[
        {"id":"5","name":"Pepillo"}
        ]}';
    }

    public function create()
    {
        echo '{"success":true}';
    }

    public function update()
    {
        echo '{"success":true}';
    }

    public function delete()
    {
        echo '{"success":true}';
    }
}