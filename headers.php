<?php

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])){
        // may also be using PUT, PATCH, HEAD etc
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");         
    }
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])){
       header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");//{$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}"); 
    }
    exit(0);
}

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET,PUT,POST,DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

