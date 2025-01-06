<?php

namespace app\controllers;

use app\models\User;
use Flight;

class WelcomeController {

	public function __construct() {

	}


	public function home() {
        if(!auth()->loggedin()) {
            Flight::redirect('login');
            return;
        }
        $user = auth()->get();
        piewpiew('home', ['user' => $user]);
    }

    public function list() {
        piewpiew('listeCadeaux');
    }
}