<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    // фильтрация информации о пользователе
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


    // смена роли пользователю
    public function change_role($user_id)
    {
        $user = User::find($user_id);
        if (!$user) return false;
        if ($user->role === 'user') $user->role = 'manager';
        else $user->role = 'user';
        $user->save();
        return true;
    }
}