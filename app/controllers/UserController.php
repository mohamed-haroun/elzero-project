<?php
declare(strict_types=1);
namespace controllers;

class UserController extends Controller
{
    public function __construct(string $layout = "user_layout")
    {
        parent::__construct($layout);
    }

    public function profile():void
    {
        $args['pageName'] = "Profile";
        $this->render('/profile', $args);
    }
}