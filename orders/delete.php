<?php
  header("Access-Control-Allow-Orgin: *");
  header("Access-Control-Allow-Methods: DELETE");
  header("Content-Type: application/json");
  header("Access-Control-Allow-HEADERS: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With ");

  include('function.php');

  $requestMethod = $_SERVER["REQUEST_METHOD"];

  if($requestMethod == "DELETE"){

    
    $deleteOrders = deleteOrders($_GET);
    echo $deleteOrders;
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