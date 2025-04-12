<?php

namespace App\Services;

use App\Models\Basket;
use App\Models\ProductsVariety;

class BasketService
{
    // получить информацию о корзине
    public function basket($request)
    {
        $user = $request->user();
        $basket = Basket::where('user_id', $user['id'])->get();
        return $basket;
    }


    // добавить один товар в корзину
    public function plus($request, $id)
    {
        $user_id = $request->user()['id'];
        $type = $request->all()['type'];

        if ($type === 'product') {
            $product_variety = ProductsVariety::where('product_id', $id)->first();
            if ($product_variety) {
                $type = 'variety';
                $id = $product_variety->id;
            }
        }
        
        $find = Basket::where('user_id', $user_id)->where('type', $type)->where('type_id', $id)->first();
        if (!$find) $item = Basket::create(['user_id' => $user_id, 'type' => $type, 'type_id' => $id, 'quantity' => 1]);
        else {
            $find->quantity += 1;
            $find->save();
        }
        return true;
    }

    // убрать один товар из корзины
    public function minus($request, $id)
    {
        $user_id = $request->user()['id'];
        $type = $request->all()['type'];

        if ($type === 'product') {
            $product_variety = ProductsVariety::where('product_id', $id)->first();
            if ($product_variety) {
                $type = 'variety';
                $id = $product_variety->id;
            }
        }
        
        $find = Basket::where('user_id', $user_id)->where('type', $type)->where('type_id', $id)->first();
        
        if ($find) {
            if ($find->quantity == 1) {
                $find->delete();

            } else {
                $find->quantity -= 1;
                $find->save();
            }
        } else return false;
        return true;
    }

}