<?php

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

if (isset($_GET['option'])) {
    $option = $_GET['option'];

    if ($option == 1) {
        $data = array('Arsenal', 'Chelsea', 'Liverpool');
    }
    if ($option == 2) {
        $data = array('Bayern', 'Dortmund', 'Gladbach');
    }
    if ($option == 3) {
        $data = array('Aek', 'Panathinaikos', 'Olympiakos');
    }
    if ($option == 4) {
        $data = array('Aek', 'Panathinaikos', 'Olympiakos');
    }
    
    $reply = array('data' => $data, 'error' => false);

    file_put_contents('debug.log', $reply, FILE_APPEND);
} else {
    $reply = array('error' => true);
}

$json = json_encode($reply);
echo $json;
