<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\User;


class LoginService
{
    public function login($data)
    {
        $user = User::where('email', $data->email)->first();


        if ($user) {
            $checked = Hash::check($data->password, $user->password);
            return $checked ? $user : false;
        }

        return false;
    }
}
