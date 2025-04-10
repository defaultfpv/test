<?php

namespace App\Services;

use App\Models\User;

class UserService
{

    // получить всех пользователь
    public function users()
    {
        $allUsers = User::all();
        foreach ($allUsers as $user) {
            if ($user['role'] === 'admin') continue;
            $users[] = $this->filter($user);
        }
        return $users;
    }


    // поиск пользователей по имени или фамилии
    public function search($text)
    {
        $allUsers = User::where('first_name', 'like', '%' . $text . '%')
             ->orWhere('last_name', 'like', '%' . $text . '%')
             ->get();
        if ($allUsers->isEmpty()) return false;
        foreach ($allUsers as $user) {
            if ($user['role'] === 'admin') continue;
            $users[] = $this->filter($user);
        }
        return $users;
    }


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