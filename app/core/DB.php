<?php

namespace core;
use PDO;
use PDOException;
class DB
{
    public static PDO $connection;

    public function __construct(private readonly array $config)
    {
    }

    public function connect(): PDO|string
    {
        try {
            self::$connection = new PDO(
                "mysql:host=" . $this->config['host'] . ";dbname=" . $this->config['database'],
                $this->config['user'],
                $this->config['pass']
            );

            return self::$connection;
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
        return "Failed to connect to database";
    }
}