<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Db extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        require_once('config/myConfig.php');
        $this->load->helper('my_helper');
    }

    public function getTableMetaData()
    {
        $params = $this->getPostParams(array('tableName', 'dbName'));
        $this->initDbConnection($params['dbName']);
        $fieldsMetadata = [];
        $fields = $this->db->field_data($params['tableName']);
        foreach ($fields as $field) {
            ($field->primary_key == 1) ? ($isPrimaryKey = true) : ($isPrimaryKey = false);
            $fieldsMetadata[] = [
                'name' => $field->name,
                'type' => $field->type,
                'maxLenght' => $field->max_length,
                'isPrimaryKey' => $isPrimaryKey
            ];
        }
        echoSuccessJsonWithData($fieldsMetadata);
    }

    public function read()
    {
        $params = $this->getPostParams(array('tableName', 'dbName'));
        $this->initDbConnection($params['dbName']);
        $records = [];
        $query = $this->db->get($params['tableName']);
        foreach ($query->result() as $row) {
            $records[] = $row;
        }
        echoSuccessJsonWithData($records);
    }

    public function create()
    {
        $params = $this->getPostParams(array('tableName', 'dbName', 'data'));
        $this->initDbConnection($params['dbName']);
        foreach ($params['data'] as $record) {
            $this->db->insert($params['tableName'], $record);
        }
        echoSuccessJson();
    }

    public function update()
    {
        $params = $this->getPostParams(array('tableName', 'dbName', 'data', 'primaryKey'));
        $this->initDbConnection($params['dbName']);
        foreach ($params['data'] as $record) {
            $this->db->where($params['primaryKey'], $record->$params['primaryKey']);
            $this->db->update($params['tableName'], $record);
        }
        echoSuccessJson();
    }

    public function delete()
    {
        $params = $this->getPostParams(array('tableName', 'dbName', 'data', 'primaryKey'));
        $this->initDbConnection($params['dbName']);
        foreach ($params['data'] as $record) {
            $this->db->where($params['primaryKey'], $record->$params['primaryKey']);
            $this->db->delete($params['tableName']);
        }
        echoSuccessJson();
    }

    private function getPostParams($params)
    {
        if (!$this->input->post() || !hasPostParams($this->input->post(), $params)) {
            echoErrorJsonWithMsg(ERROR_GENERIC);
            //throw new Exception(EXCEPTION_POST_PARAM_NOT_FOUND);
            die();
        }
        $postParams = [];
        foreach ($params as $param) {
            if (json_decode($this->input->post($param)) == null) {
                $postParams[$param] = $this->input->post($param);
            } else {
                $postParams[$param] = json_decode($this->input->post($param));
            }
        }
        return $postParams;
    }

    private function initDbConnection($dbName)
    {
        $this->load->database('mysql://' . DB_USER . ':' . DB_PASS . '@' . DB_SERVER . '/' . $dbName);
    }
}