<?php

namespace core;

class Application
{
    private static DB $database;
    public function __construct(
        public Router $router,
        public array $config
    )
    {
        static::$database = new DB($this->config);
    }

    public function run(): void
    {
        try {
            echo $this->router->resolve(strtolower($_SERVER['REQUEST_METHOD']), $_SERVER['REQUEST_URI']);
        } catch (\exceptions\RouterNotFoundException $exception) {
            echo $exception->getMessage();
        }
    }

    public static function DBconnect(): \PDO|string
    {
        return (static::$database)->connect();
    }

}