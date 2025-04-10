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
        $user = $request->user();
        $filter = $this->userService->filter($user);
        return response()->json(['user' => $filter], 200);
    }


    /**
    * @OA\Get(
    *     path="/users",
    *     tags={"Пользователи"},
    *     summary="Получить список всех пользователей", 
    *     @OA\Response(
    *         response=200,
    *         description="Success",
    *         @OA\JsonContent(
    *             type="object",
    *             @OA\Property(property="users", type="array",
    *                 @OA\Items(
    *                     ref="#/components/schemas/User"
    *                 )
    *             )
    *         )
    *     ),
    *     security={{"bearerAuth": {}}}
    * )
    */
    public function all(Request $request)
    {
        $user = $request->user();
        if ($user['role'] != 'admin') return response()->json(['message' => 'Это действие может выполнить только администратор'], 403);
        $users = $this->userService->users();
        return response()->json(['users' => $users], 200);
    }


    /**
    * @OA\Get(
    *     path="/users/search",
    *     tags={"Пользователи"},
    *     summary="Поиск пользователей по имени или фамилии",
    *     @OA\Parameter(name="search", in="query", required=true, description="поисковой запрос", @OA\Schema(type="string")),
    *     @OA\Response(
    *         response=200,
    *         description="Success",
    *         @OA\JsonContent(
    *             type="object",
    *             @OA\Property(property="users", type="array",
    *                 @OA\Items(
    *                     ref="#/components/schemas/User"
    *                 )
    *             )
    *         )
    *     ),
    *     security={{"bearerAuth": {}}}
    * )
    */
    public function search(Request $request)
    {
        $user = $request->user();
        if ($user['role'] != 'admin') return response()->json(['message' => 'Это действие может выполнить только администратор'], 403);
        $get = request()->query();
        if (!array_key_exists('search', $_GET)) return response()->json(['message' => 'Не найден необходимый ключ'], 403);
        $users = $this->userService->search($_GET['search']);
        if (!$users) return response()->json(['massage' => 'not resoult'], 404);
        return response()->json(['users' => $users], 200);
    }



    /**
    * @OA\Post(
    *     path="/users/changerole/{user_id}",
    *     tags={"Пользователи"},
    *     summary="Сменить роль пользователю: user/manager", 
    *     @OA\Response(
    *         response=200,
    *         description="Success",
    *         @OA\JsonContent(
    *             @OA\Property(property="message", type="string")
    *         )
    *     ),
    *     security={{"bearerAuth": {}}}
    * )
    */
    public function changerole(Request $request, $user_id)
    {
        $user = $request->user();
        if ($user['role'] != 'admin') return response()->json(['message' => 'Это действие может выполнить только администратор'], 403);
        $changeRole = $this->userService->change_role($user_id);
        if (!$changeRole) return response()->json(['message' => 'user not found'], 404);
        return response()->json(['message' => 'success'], 200);
    }
}
