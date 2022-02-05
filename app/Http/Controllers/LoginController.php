<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StoreloginRequest;
use App\Services\LoginService;

class LoginController extends Controller
{
    public function login(StoreLoginRequest $request, LoginService $service)
    {
        $logged = $service->login($request);

        return response(
            $logged ? $logged : 'Login parameters invalid or user not registered',
            $logged ? 200 : 400
        );
    }
}
