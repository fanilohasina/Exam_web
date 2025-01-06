<?php

declare(strict_types=1);

namespace app\controllers;

use Flight;
use flight\Engine;

class AuthController
{
    /** @var Engine */
    protected Engine $app;

    /**
     * Constructor
     */
    public function __construct(Engine $app)
    {
        $this->app = $app;
    }

    public function login() {
        piewpiew('login');
    }

    public function dologin() {
        $name = $_POST['name'];
        $password = $_POST['password'];
        
        if(auth()->login([
            'id_column' => ['user_name' => $name],
            'pass_column' => $password
        ]))
            Flight::redirect('.');
        else
            Flight::redirect('login?error=Mot de Passe Errone');
    }

    public function register() {
        piewpiew('inscription');
    }

    public function doregister() {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        if($password != $confirm){
            Flight::redirect('inscription?error=password');
            return;
        }
        auth()->register(['user_name'=>$name, 'user_password'=> $password]);
        Flight::redirect('login');
    }
}