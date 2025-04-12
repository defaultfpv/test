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



    public function basket(Request $request)
    {
        $user = $request->user();
        if (!Basket::where('user_id', $user['id'])->first()) return response()->json(['massage' => 'The basket is empty'], 404);
        
        $basket = $this->basketService->basket($request);
        return response()->json(['basket' => $basket], 200);
    }

    /**
     * @OA\Post(
     *     path="/basket/plus/{type_id}",
     *     tags={"Корзина"},
     *     summary="Добавить один товар в корзину",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"type"},
     *             @OA\Property(property="type", type="string"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Success"
     *     ),
     *     security={{"bearerAuth": {}}}
     * )
     */
    public function plus(Request $request, $id)
    {        
        if (!array_key_exists('type', $request->all())) return response()->json(['massage' => 'The required key was not found.'], 403);
        if ($request->all()['type'] !== 'product' and $request->all()['type'] !== 'variety') return response()->json(['massage' => "Invalid 'type' key value. The value of the 'type' key can only be 'product' or 'variety'."], 403);
        if ($request->all()['type'] === 'product') if (!Product::find($id)) return response()->json(['massage' => 'Product not found'], 404);
        if ($request->all()['type'] === 'variety') if (!ProductsVariety::find($id)) return response()->json(['massage' => 'Variety not found'], 404);
        
        $plus = $this->basketService->plus($request, $id);

        return response()->json(['massage' => 'Success'], 204);
    }


    /**
     * @OA\Post(
     *     path="/basket/minus/{type_id}",
     *     tags={"Корзина"},
     *     summary="Убрать один товар из корзины",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"type"},
     *             @OA\Property(property="type", type="string"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Success"
     *     ),
     *     security={{"bearerAuth": {}}}
     * )
     */
    public function minus(Request $request, $id)
    {
        if (!array_key_exists('type', $request->all())) return response()->json(['massage' => 'The required key was not found.'], 403);
        if ($request->all()['type'] !== 'product' and $request->all()['type'] !== 'variety') return response()->json(['massage' => "Invalid 'type' key value. The value of the 'type' key can only be 'product' or 'variety'."], 403);
        if ($request->all()['type'] === 'product') if (!Product::find($id)) return response()->json(['massage' => 'Product not found'], 404);
        if ($request->all()['type'] === 'variety') if (!ProductsVariety::find($id)) return response()->json(['massage' => 'Variety not found'], 404);
        
        $plus = $this->basketService->minus($request, $id);
        if (!$plus) return response()->json(['massage' => 'The current bucket position was not found'], 404);

        return response()->json(['massage' => 'Success'], 204);
    }



    public function delete_position(Request $request, $product_id)
    {

    }

    // public function clean_basket(Request $request)
    // {

    // }


}
