<?php

namespace app\middlewares;

use Flight;

class AuthMiddleware
{
    public function user($request, $response)
    {
        if (!auth()->loggedin()) {
            Flight::redirect('/login');
            return;
        }
    }
}
