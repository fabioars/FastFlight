<?php
namespace core\db;
use Flight;
use PDO;

class FastSingleton{

    private static $instance;

    private function __construct(){}

    public static function getInstance(){
        if (!isset(static::$instance)) {
            $env = (array) Flight::get("env");
            $databases = (array) $env['database'];
            $config = $databases[$env['environment']];
            $dsn = "{$config->driver}:host={$config->host}; dbname={$config->db}";
            static::$instance = new PDO($dsn, $config->user, $config->password);
        }
        return static::$instance;
    }
}
