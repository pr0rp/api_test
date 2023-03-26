
<?php
namespace App\Controllers;
 
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
 
class UsersController
{
    public function index(Request $request, Response $response)
    {
        $query = "SELECT * FROM users";
        $result = \App\Lib\DB::query($query)->fetchAll(PDO::FETCH_ASSOC);
        $response->getBody()->write(json_encode($result));
        return $response;
    }
 
    public function show(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        $query = "SELECT * FROM users";
        $result = \App\Lib\DB::query($query)->fetchById(PDO::FETCH_ASSOC);
        $response->getBody()->write(json_encode($result));
        return $response;
    }
 
    public function store(Request $request, Response $response)
    {
        $data = $request->getParsedBody();
        $response->getBody()->write(json_encode($data));
        return $response;
    }
 
    public function update(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        $data = $request->getParsedBody();
        $response->getBody()->write("Update page: $id");
        return $response;
    }
 
    public function delete(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        $result = \App\Lib\DB::query($query)->fetchById(PDO::FETCH_ASSOC);
        $response->getBody()->write(json_encode($result));
    }
}
?>