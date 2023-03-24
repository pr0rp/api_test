<?php
  header("Access-Control-Allow-Orgin: *");
  header("Access-Control-Allow-Methods: *");
  header("Content-Type: application/json");
  header("Access-Control-Allow-HEADERS: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With ");

  include('function.php');

  $requestMethod = $_SERVER["REQUEST_METHOD"];

  if($requestMethod == "POST"){

    $inputData = json_decode(file_get_contents("php://input"), true);
    if(empty($inputData)){
        $storeOrders = storeOrders($_POST);
    }
    else
    {
        $storeOrders = storeOrders($inputData);
    }
    echo $storeOrders;
  } 
  else
  {
    $data = [
        'status' => 405,
        'message' => $requestMethod.'Method not allowed',
    ];
    header("HTTP/1.0 405 Method not allowed");
    echo json_encode($data);
  }
?>