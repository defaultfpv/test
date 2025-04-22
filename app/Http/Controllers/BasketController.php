<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\Product;
use App\Models\ProductsVariety;
use App\Services\BasketService;


class BasketController extends Controller
{
    
    protected $basketService;

    public function __construct(BasketService $basketService)
    {
        $this->basketService = $basketService;
    }

    /**
    * @OA\Get(
    *     path="/basket",
    *     tags={"Корзина"},
    *     summary="Получить полную информацию о корзине",
    *     @OA\Response(
    *         response=200,
    *         description="Успешный ответ с информацией о корзине",
    *         @OA\JsonContent(
    *             @OA\Property(property="basket", type="array",
    *                 @OA\Items(
    *                     type="object",
    *                     @OA\Property(property="id", type="integer", description="Идентификатор товара"),
    *                     @OA\Property(property="type", type="string", description="Тип товара (product или variety)"),
    *                     @OA\Property(property="type_id", type="integer", description="Идентификатор типа товара"),
    *                     @OA\Property(property="title", type="string", description="Название товара"),
    *                     @OA\Property(property="count", type="integer", description="Количество товара в корзине"),
    *                     @OA\Property(property="price", type="integer", description="Цена товара"),
    *                     @OA\Property(property="image", type="string", description="URL изображения товара"),
    *                     @OA\Property(property="variety", type="string", description="Вариант товара (необязательное поле)")
    *                 )
    *             )
    *         )
    *     ),
    *     security={{"bearerAuth": {}}}
    * )
    */
    public function basket(Request $request)
    {
        $user = $request->user();
        $basket = [];
        if (!Basket::where('user_id', $user['id'])->first()) return response()->json(['massage' => $basket], 200);
        
        $basket = $this->basketService->basket($request);
        return response()->json(['basket' => $basket], 200);
    }

    /**
    * @OA\Post(
    *     path="/basket/plus/variety/{variety_id}",
    *     tags={"Корзина"},
    *     summary="Добавить вариант товара в корзину",
    *     @OA\Response(
    *         response=204,
    *         description="Success"
    *     ),
    *     security={{"bearerAuth": {}}}
    * )
    */
    public function plus_variety(Request $request, $id)
    {        
        if (!ProductsVariety::find($id)) return response()->json(['massage' => 'Variety not found'], 404);
        $plus = $this->basketService->plus($request, 'variety', $id);
        return response()->json(['massage' => 'Success'], 204);
    }


    /**
    * @OA\Post(
    *     path="/basket/plus/product/{product_id}",
    *     tags={"Корзина"},
    *     summary="Добавить товар в корзину",
    *     @OA\Response(
    *         response=204,
    *         description="Success"
    *     ),
    *     security={{"bearerAuth": {}}}
    * )
    */
    public function plus_product(Request $request, $id)
    {        
        if (!Product::find($id)) return response()->json(['massage' => 'Product not found'], 404);
        $plus = $this->basketService->plus($request, 'product', $id);
        return response()->json(['massage' => 'Success'], 204);
    }


    /**
    * @OA\Post(
    *     path="/basket/minus/variety/{variety_id}",
    *     tags={"Корзина"},
    *     summary="Убрать один вариант товара из корзины",
    *     @OA\Response(
    *         response=204,
    *         description="Success"
    *     ),
    *     security={{"bearerAuth": {}}}
    * )
    */
    public function minus_variety(Request $request, $id)
    {
        if (!ProductsVariety::find($id)) return response()->json(['massage' => 'Variety not found'], 404);
        $plus = $this->basketService->minus($request, 'variety', $id);
        if (!$plus) return response()->json(['massage' => 'The current bucket position was not found'], 404);
        return response()->json(['massage' => 'Success'], 204);
    }

    
    
    /**
    * @OA\Post(
    *     path="/basket/minus/product/{product_id}",
    *     tags={"Корзина"},
    *     summary="Убрать один товар из корзины",
    *     @OA\Response(
    *         response=204,
    *         description="Success"
    *     ),
    *     security={{"bearerAuth": {}}}
    * )
    */
    public function minus_product(Request $request, $id)
    {        
        if (!Product::find($id)) return response()->json(['massage' => 'Product not found'], 404);
        $plus = $this->basketService->minus($request, 'product', $id);
        if (!$plus) return response()->json(['massage' => 'The current bucket position was not found'], 404);
        return response()->json(['massage' => 'Success'], 204);
    }


    /**
    * @OA\Delete(
    *     path="/basket/delete/{position_id}",
    *     tags={"Корзина"},
    *     summary="Удалить позицию из корзины",
    *     @OA\Response(
    *         response=204,
    *         description="Success"
    *     ),
    *     security={{"bearerAuth": {}}}
    * )
    */
    public function delete_position(Request $request, $position_id)
    {
        $position = Basket::find($position_id);
        if (!$position) return response()->json(['massage' => 'The current bucket position was not found'], 404);
        $delete = $this->basketService->delete_position($position_id);
        return response()->json(['massage' => 'Success'], 204);
    }



    /**
    * @OA\Delete(
    *     path="/basket/clean",
    *     tags={"Корзина"},
    *     summary="Очистить корзину пользователю",
    *     @OA\Response(
    *         response=204,
    *         description="Success"
    *     ),
    *     security={{"bearerAuth": {}}}
    * )
    */
    public function clean_basket(Request $request)
    {
        $basket = Basket::where('user_id', $request->user()['id'])->delete();
        return response()->json(['massage' => 'Success'], 204);
    }


}
