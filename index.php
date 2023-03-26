<?php
require 'vendor/autoload.php';
$app = new \Slim\App;


$app->get('/api/user', 'App\Controllers\UsersController:index');
$app->get('/api/user/{id}', 'App\Controllers\UsersController:show');
$app->post('/api/user', 'App\Controllers\UsersController:store');
$app->put('/api/user/{id}', 'App\Controllers\UsersController:update');
$app->delete('/api/user/{id}', 'App\Controllers\UsersController:delete');

$app->run();
?>