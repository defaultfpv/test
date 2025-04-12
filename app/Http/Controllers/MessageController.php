<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Services\MessageService;


class MessageController extends Controller
{
    
    protected $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }



    /**
    * @OA\Post(
    *     path="/message",
    *     tags={"Сообщения"},
    *     summary="Отправить запрос ai",
    *     @OA\RequestBody(
    *         required=true,
    *         @OA\JsonContent(
    *             required={"text"},
    *             @OA\Property(property="text", type="string"),
    *         )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Success",
    *         @OA\JsonContent(
    *             @OA\Property(property="messages", type="array", @OA\Items(ref="#/components/schemas/Message")),
    *         )
    *     ),
    * )
    *
    * @OA\Schema(
    *      schema="Message",
    *      @OA\Property(property="author", type="string"),
    *      @OA\Property(property="message", type="string", nullable=true),
    *      @OA\Property(property="products", type="array", @OA\Items(ref="#/components/schemas/ProductMini"), nullable=true),
    *      @OA\Property(property="created_at", type="string")
    * )
    *
    * @OA\Schema(
    *      schema="ProductMini",
    *      @OA\Property(property="id", type="integer"),
    *      @OA\Property(property="title", type="string"),
    *      @OA\Property(property="price", type="number", format="float"),
    *      @OA\Property(property="image", type="string")
    * )
    */
    public function message(Request $request)
    { 

        $message = $this->messageService->message($request);
        return response()->json(['messages' => $message], 200);
    }




/**
 * @OA\Get(
 *     path="/messages",
 *     tags={"Сообщения"},
 *     summary="Получить список сообщений",
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *         @OA\JsonContent(
 *             @OA\Property(property="messages", type="array", @OA\Items(ref="#/components/schemas/Message")),
 *         )
 *     ),
 * )
 */
    public function messages(Request $request)
    {
        $messages = $this->messageService->messages($request);
        return response()->json(['messages' => $messages], 200);
    }

}