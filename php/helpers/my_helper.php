<?php

function echoErrorJson()
{
    $response = array(
        'success' => FALSE
    );
    echo json_encode($response);
}

function echoSuccessJson()
{
    $response = array(
        'success' => TRUE
    );
    echo json_encode($response);
}

function echoSuccessJsonWithData($data)
{
    $response = array(
        'success' => true,
        'count' => count($data),
        'data' => $data
    );
    echo(json_encode($response));
}

function echoErrorJsonWithMsg($msg)
{
    $response = array(
        'success' => FALSE,
        'msg' => $msg
    );
    echo json_encode($response);
}

function hasPostParams($input, $paramArray)
{
    foreach ($paramArray as $param) {
        if (!array_key_exists($param, $input)) {
            return false;
        }
    }
    return true;
}