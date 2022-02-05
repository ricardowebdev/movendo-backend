<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserService
{
    public function list()
    {
        $users = User::where('active', 1)->get();
        return $users;
    }

    public function register($data)
    {
        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'admin' => isset($data->admin) ? (int) $data->admin : 0,
            'active' => 1
        ]);

        return $user ?? false;
    }

    public function update($id, $data)
    {
        $user = User::find($id);
        if (!$user) {
            return false;
        }

        $check = Hash::check($data->oldPassword, $user->password);
        if (!$check) {
            return false;
        }

        $user->update([
            'name'     => $data->name,
            'email'    => $data->email,
            'password' => Hash::make($data->password),
            'admin'    => isset($data->admin) ? (int) $data->admin : $user->admin
        ]);

        return $user ?? false;
    }

    public function disableEnable($id)
    {
        $user = User::find($id);
        if (!$user) {
            return false;
        }

        $user->update([
            'active' => !$user->active
        ]);

        return $user;
    }

    public function get($id)
    {
        $user = User::where('id', $id)->get();
        return $user;
    }
}
