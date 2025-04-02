<?php

namespace App\Http\Controllers;

use App\Swagger\Swagger;
use Illuminate\Http\Request;
use App\Services\UserService;

class UsersController extends Controller
{
    
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
    * @OA\Get(
    *     path="/users/me",
    *     tags={"Пользователи"},
    *     summary="Получить информацию о текущем пользователе",
    *     @OA\RequestBody(
    *         required=false,
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Success",
    *         @OA\JsonContent(
    *             @OA\Property(property="user", type="object", ref="#/components/schemas/User")
    *         )
    *     ),
    *     security={{"bearerAuth": {}}}
    * )
    *
    *
    * @OA\Schema(
    *      schema="User",
    *      @OA\Property(property="id", type="integer"),
    *      @OA\Property(property="first_name", type="string"),
    *      @OA\Property(property="last_name", type="string"),
    *      @OA\Property(property="email", type="string"),
    *      @OA\Property(property="role", type="string"),
    *      @OA\Property(property="created_at", type="string", format="date-time")
    * )
    *
    */
    public function me(Request $request)
    {
        $user = $request->user(); // Получаем текущего аутентифицированного пользователя
        if (is_null($user)) return response()->json(['user' => 'guest'], 200);
        $filter = $this->userService->filter($user);
        return response()->json(['user' => $filter], 200);
    }
}
