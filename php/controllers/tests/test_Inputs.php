<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Test_Inputs extends CI_Controller
{
    private $firstParameter;
    private $secondParameter;
    private $testUrl;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->helper('url');
        $this->firstParameter = 'foo';
        $this->secondParameter = 'bar';
        $this->testUrl = site_url('examples/Inputs');
    }

    public function index()
    {
        $expected = $this->firstParameter . $this->secondParameter;
        $this->unit->run($this->testURI(), $expected, 'URI input test');
        $this->unit->run($this->testGet(), $expected, 'get input test');
        $this->unit->run($this->testPost(), $expected, 'POST input test');
        echo $this->unit->report();
    }

    private function testURI()
    {
        $url = $this->testUrl . '/URI/' . $this->firstParameter . '/' . $this->secondParameter;
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1
        );
        return $this->doCurl($options);
    }

    private function testGet()
    {
        $url = $this->testUrl . '/get/?first=' . $this->firstParameter . '&second=' . $this->secondParameter;
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1
        );
        return $this->doCurl($options);
    }

    private function testPost()
    {
        $url = $this->testUrl . '/post/';
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => array(
                'first' => $this->firstParameter,
                'second' => $this->secondParameter
            )
        );
        return $this->doCurl($options);
    }

    private function doCurl($options)
    {
        $curl = curl_init();
        curl_setopt_array($curl, $options);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
}