<?php

declare(strict_types=1);
require_once __DIR__ . "/vendor/autoload.php";
session_start();
use core\{Application, Request, Response, Router};
use controllers\{SiteController, MessageController, AuthController, UserController};

/*
 * @author Mohamed Haroun
 * */

//Creating the doenv file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//Define the paths of the site
const VIEW_PATH = __DIR__ . "/views";

$config = [
    'db' => [
        "host"      => $_ENV['DB_HOST'],
        "user"      => $_ENV['DB_USER'],
        "pass"      => $_ENV['DB_PASS'],
        "database"  => $_ENV['DB_SCHEMA'],
    ]
];

$router = (new Router(new Request(), new Response()))
    ->get("/",                  [SiteController::class, "index"])
    ->get("/login",             [SiteController::class, "login"])
    ->get("/register",          [SiteController::class, "register"])
    ->get("/contact",           [SiteController::class, "contact"])
    ->get("/profile",           [UserController::class, "profile"])
    ->post("/login",            [AuthController::class, "login"])
    ->get("/logout",            [AuthController::class, "logout"])
    ->post("/register",         [AuthController::class, "register"])
    ->post("/send_message",     [MessageController::class, "saveMessage"]);

(new Application($router, $config['db']))->run();