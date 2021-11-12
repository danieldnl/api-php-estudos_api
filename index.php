<?php

//Request
$data = request();

//Response
response($data);

function request()
{
    $data['status'] = 'ERROR';
    $data['data'] = null;

    if (isset($_GET['OPTION'])) {
        if ($_GET['OPTION'] == 'status') {
            define_response($data, 'API running OK!!');
        }

        if ($_GET['OPTION'] == 'random') {
            $min = 0;
            $max = 1000;
            $min = isset($_GET['min']) ? intval($_GET['min']) : $min; 
            $max = isset($_GET['max']) ? intval($_GET['max']) : $max; 
            if($min <= $max){
                define_response($data, rand($min, $max));
            }
        }
    }

    return $data;
}

function define_response(&$data, $value)
{
    $data['status'] = 'SUCCESS';
    $data['data'] = $value;
}

function response($data_response)
{
    header('Content-Type:application/json');
    echo json_encode($data_response);
}
