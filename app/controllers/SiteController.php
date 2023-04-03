<?php

namespace controllers;
class SiteController extends Controller
{

    public function __construct(protected string $layout = "main_layout")
    {
        parent::__construct($layout);
    }

    public function index($args): string
    {
        ob_start();

        if (isset($_SESSION['user'])) {
            header("Location: /profile");
        }
        $args['pageName'] = "Home";
        $this->render('/home', $args);
        return ob_get_clean();
    }

    public function login($args): string
    {
        ob_start();

        if (isset($_SESSION['user'])) {
            header("Location: /profile");
        }
        $args['pageName'] = "Login";
        $this->render('/login', $args);
        return ob_get_clean();
    }

    public function register($args): string
    {
        ob_start();

        if (isset($_SESSION['user'])) {
            header("Location: /profile");
        }
        $args['pageName'] = "Register";
        $this->render('/register', $args);
        return ob_get_clean();

    }

    public function contact(): string
    {
        ob_start();

        if (isset($_SESSION['user'])) {
            header("Location: /profile");
        }
        $args['pageName'] = "Contact";
        $this->render('/contact', $args);
        return ob_get_clean();

    }

}