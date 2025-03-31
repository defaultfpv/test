<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(title="PET_STORE API", version="1.0.0")
 * 
 * @OA\Tag(
 *     name="Авторизация",
 *     description=""
 * )
 */

class AuthController extends Controller
{


    /**
     * @OA\Post(
     *     path="/api/register",
     *     tags={"Авторизация"},
     *     summary="Регистрация",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"first_name", "last_name", "email","password", "password_confirmation"},
     *             @OA\Property(property="first_name", type="string"),
     *             @OA\Property(property="last_name", type="string"),
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="password", type="string", format="password"),
     *             @OA\Property(property="password_confirmation", type="string", format="password"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(property="token", type="string"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized"
     *     )
     * )
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'api_token' => Str::random(40),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'none',
        ]);

        return response()->json(['token' => $user->api_token], 201);
    }


    /**
     * @OA\Post(
     *     path="/api/login",
     *     tags={"Авторизация"},
     *     summary="Авторизация",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email","password"},
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="password", type="string", format="password"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(property="token", type="string"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized"
     *     )
     * )
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Неверные данные'], 401);
        }

        // Генерация нового токена
        $user->api_token = Str::random(40); // Генерация токена
        $user->save(); // Сохранение нового токена в базе данных

        return response()->json(['token' => $user->api_token], 200);
    }



    /**
     * @OA\Post(
     *     path="/api/logout",
     *     tags={"Авторизация"},
     *     summary="Выход",
     *     @OA\RequestBody(
     *         required=false,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="error"
     *     ),
     *     security={{"bearerAuth": {}}}
     * )
     */
    public function logout(Request $request)
    {
        $user = $request->user(); // Получаем текущего аутентифицированного пользователя
        $user->api_token = null; // Устанавливаем токен в null
        $user->save(); // Сохраняем изменения

        return response()->json(['message' => 'success'], 200);
    }
}