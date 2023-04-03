<?php

namespace controllers;

use Exception;
use models\UserModel;

class AuthController extends Controller
{
    public function __construct(
        string                     $layout = "main_layout",
        private readonly UserModel $userModel = new UserModel())
    {
        parent::__construct($layout);
    }

    //Registering a new user

    /**
     * @throws Exception
     */
    public function register($args): string
    {
        ob_start();

        $request = $args['request'];
        if ($request->getRequestMethod() == 'post') {
            $this->userModel->loadData($request->getBody());
            if ($this->userModel->validateData()) {
                if (! $this->checkIfUserExists('email', $this->userModel->email)) {
                    $created = $this->userModel->createNewUser();
                    if ($created) {
                        $this->login($args);
                    } else {
                        return "Failed to create new user";
                    }
                } else {
                    $this->render("register", [
                        'pageName' => "Register",
                        'model' => $this->userModel
                    ]);
                }
            } else {
                $this->render("register", [
                    'pageName' => "Register",
                    'model' => $this->userModel
                ]);
            }

        } else {
            return "Invalid request method";
        }
        return ob_get_clean();
    }

    public function login($args): string | UserModel
    {
        ob_start();
        $request = $args['request'];
        if ($request->getRequestMethod() === 'post') {
            $userData = $request->getBody();
            $user = $this->userModel->login($userData['email'], $userData['user_password']);

            $_SESSION['user'] = $user;

            header("Location: /profile");
        }
        return ob_get_clean();
    }

    public function logout():void
    {
        session_destroy();
        header("Location: /");
    }

    public function checkIfUserExists($needle, $search): bool
    {
        if ($this->userModel->getUser($needle, $search)) {
            return true;
        }

        return false;
    }
}