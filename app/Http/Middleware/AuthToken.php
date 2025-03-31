<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class AuthToken
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['message' => 'Токен не предоставлен'], 401);
        }

        $user = User::where('api_token', $token)->first();

        if (!$user) {
            return response()->json(['message' => 'Неверный токен'], 401);
        }

        // Устанавливаем пользователя в запрос
        $request->setUserResolver(function () use ($user) {
            return $user;
        });

        return $next($request);
    }
}