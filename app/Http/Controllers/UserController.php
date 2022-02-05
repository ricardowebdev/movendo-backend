<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Services\UserService;

class UserController extends Controller
{
    public function register(StoreUserRequest $request, UserService $service)
    {
        $user = $service->register($request);

        return response(
            $user ? $user : 'Failed in adding User',
            $user ? 200 : 400
        );
    }

    public function update($id, StoreUserRequest $request, UserService $service)
    {
        $user = $service->update($id, $request);

        return response(
            $user ? $user : 'Failed in updating User',
            $user ? 200 : 400
        );
    }

    public function list(UserService $service)
    {
        $users = $service->list();

        return response(
            $users ? $users : 'Failed in adding User',
            $users ? 200 : 400
        );
    }

    public function disableEnable($id, UserService $service)
    {
        $user = $service->disableEnable($id);

        return response(
            $user ? $user : 'Operation faile, please verify if the user is correct',
            $user ? 200 : 400
        );
    }

    public function get($id, UserService $service)
    {
        $user = $service->get($id);
        $status = $user ? 200 : 404;
        $response = $user ? $user : 'User not found';

        return response($response, $status);
    }
}
