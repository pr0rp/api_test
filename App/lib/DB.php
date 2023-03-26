<?php
namespace App\Lib;
 
use PDO;
 
class DB
{
    private static $instance;
    private static $db;
 
    private function __construct()
    {
        $host = "localhost";
        $dbname = "users";
        $username = "root";
        $password = "";
        self::$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    }
 
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new DB();
        }
        return self::$instance;
    }
 
    public static function query($query)
    {
        return self::$db->query($query);
    }
}
?>