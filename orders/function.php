<?php

    require '../inc/dbcon.php';

    function error422($message){

        $data = [
            'status' => 422,
            'message' => $requestMethod.'Unprocessable Entity',
        ];
        header("HTTP/1.0 422 Unprocessable Entity");
        echo json_encode($data);
        exit();
    }

/*Метод Post создание нового заказа
*в postman 
*http://localhost/api/orders/create.php
*/

    function storeOrders($ordersInput){
        global $conn;
        $item = mysqli_real_escape_string($conn, $ordersInput['item']);
        $firstaddress = mysqli_real_escape_string($conn, $ordersInput['first_address']);
        $lastaddres = mysqli_real_escape_string($conn, $ordersInput['last_addres']);
        $time = mysqli_real_escape_string($conn, $ordersInput['time']);
        
        if(empty(trim($item))){
            return error422('Enter item');
        }elseif(empty(trim($firstaddress))){
            return error422('Enter firstaddress');
        }elseif(empty(trim($lastaddres))){
            return error422('Enter lastaddres');
        }elseif(empty(trim($time))){
            return error422('Enter time');
        }
        else
        {
            $query = "INSERT INTO orders (item,first_address,last_addres,time) VALUES ('$item','$firstaddress','$lastaddres','$time')";
            $result = mysqli_query($conn,  $query);

            if($result){
                $data = [
                    'status' => 201,
                    'message' => 'Order Created Succesfully',
                ];
                header("http/1.0 201 Created");
                return json_encode($data);
            }
            else{
                $data = [
                    'status' => 500,
                    'message' => 'internal server error',
                ];
                header("http/1.0 500 internal server error");
                return json_encode($data);
            }
        }
   
    }

/*Метод Get выводит список всех записей
*в postman 
*http://localhost/api/orders/read.php
*/

function getOrdersList(){
    global $conn;
    $query = "SELECT * FROM orders";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        if(mysqli_num_rows($query_run)>0){
            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

            $data = [
                'status' => 200,
                'message' => 'customer list fetched successfully',
                'data' => $res
            ];
            header("http/1.0 200 OK");
            return json_encode($data);
            
        }
        else
        {
            $data = [
                'status' => 404,
                'message' => 'no customer found',
            ];
            header("http/1.0 404 internal server error");
            return json_encode($data);
        }
    } 
    else
    {
        $data = [
            'status' => 500,
            'message' => 'internal server error',
        ];
        header("http/1.0 500 internal server error");
        return json_encode($data);
    }
}

/*Метод Get просмотр отдельной записи(по id)
*в postman 
*http://localhost/api/orders/read.php?id=1
*/

function getOrders($ordersParams){
    global $conn;
    if($ordersParams['id'] == null){
        return error422('enter order id');
    }
    $orderId = mysqli_real_escape_string($conn, $ordersParams['id']);
    $query = "SELECT * FROM orders WHERE id='$orderId' LIMIT 1";
    $result = mysqli_query($conn, $query);
    
    if($result){
        if(mysqli_num_rows($result) == 1){
            $res = mysqli_fetch_assoc($result);
            $data = [
                'status' => 200,
                'message' => 'Order Fetched Succesfully',
                'data' => $res
            ];
            header("http/1.0 201 OK");
            return json_encode($data);

            
        }
        else{
            $data = [
                'status' => 404,
                'message' => 'No order found',
            ];
            header("http/1.0 500 Not found");
            return json_encode($data);
        }
    }
    else
    {
        $data = [
            'status' => 500,
            'message' => 'internal server error',
        ];
        header("http/1.0 500 internal server error");
        return json_encode($data);
    }

}

?>