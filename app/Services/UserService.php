<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function filter($user)
    {
        return $filter = [
            'id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'role' => $user->role,
            'created_at' => $user->created_at,
        ];
    }
}