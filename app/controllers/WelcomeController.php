<?php

namespace app\controllers;

use app\models\User;
use Flight;

class WelcomeController {

	public function __construct() {

	}

	public function home() {
        $user = auth()->get();
        piewpiew('home', ['user' => $user]);
    }

}