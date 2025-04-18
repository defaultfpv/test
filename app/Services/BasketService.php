<?php

namespace App\Services;

use App\Models\Basket;
use App\Models\Product;
use App\Models\ProductsVariety;

class BasketService
{
    // получить информацию о корзине
    public function basket($request)
    {
        $user = $request->user();
        $positions = Basket::where('user_id', $user['id'])->get();
        $basket = [];
        foreach ($positions as $position) {
            if ($position->type === 'product') {
                $product = Product::with('images')->find($position->type_id);
                $price = $product->price;
            } else {
                $product_variety = ProductsVariety::find($position->type_id);
                $product = Product::with('images')->find($product_variety->product_id);
                $price = $product_variety->price;
                $variety_title = $product_variety->variety_description;
            }
            $item = [
                'id' => $position->id,
                'type' => $position->type,
                'type_id' => $position->type_id,
                'title' => $product->title,
                'count' => $position->quantity,
                'price' => $price,
                'image' => $product['images'][0]['path']
            ];
            if ($position->type != 'product') $item['variety'] = $variety_title;
            $basket[] = $item;
        }
        return $basket;
    }


    // добавить один товар в корзину
    public function plus($request, $type, $id)
    {
        $user_id = $request->user()['id'];

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
    public function minus($request, $type, $id)
    {
        $user_id = $request->user()['id'];

        if ($type === 'product') {
            $product_variety = ProductsVariety::where('product_id', $id)->first();
            if ($product_variety) {
                $type = 'variety';
                $id = $product_variety->id;
            }
        }
        
        $find = Basket::where('user_id', $user_id)->where('type', $type)->where('type_id', $id)->first();
        
        if ($find) {
            if ($find->quantity === 1) {
                $find->delete();

            } else {
                $find->quantity -= 1;
                $find->save();
            }
        } else return false;
        return true;
    }


    // удалить позицию из корзины
    public function delete_position($position_id)
    {
        $position = Basket::find($position_id);
        $position->delete();
        return true;
    }

}