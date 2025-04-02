<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Filter;

class ProductService
{
    // получение товаров
    public function products($sections_pets) {
        $sections_pets_id = $sections_pets->first()->id;
        $products = Product::with('images')
        ->where('sections_pets_id', $sections_pets_id)
        ->get();
        $products = $this->filter_list_products($products);
        return $products;
    }

    // фильтрация ключей списка товаров
    public function filter_list_products($products)
    {
        return $products->map(function ($product) {
            $filteredImages = $product->images->filter(function ($image) {
                return isset($image->path);
            })->map(function ($image) {
                return $image->path;
            });
            $firstImage = $filteredImages->first();

            return [
                'id' => $product->id,
                'title' => $product->title,
                'price' => $product->price,
                'image' => $firstImage,
            ];
        });
    }

    // получение сортировки
    public function sort() {
        $sort = [
            [
                'title' => 'По популярности',
                'value' => 'by_popularity'
            ],
            [
                'title' => 'По возрастанию цены',
                'value' => 'ascending_order'
            ],
            [
                'title' => 'По убыванию цены',
                'value' => 'descending_order'
            ]
        ];
        
        return  $sort;
    }

    // получение фильтров
    public function filters($section_id) {
        $filters = Filter::whereHas('sections', function ($query) use ($section_id) {
            $query->where('sections.id', $section_id);
        })->get();

        $filters = $this->filter_list_filter($filters);
        
        return  $filters;
    }


    // фильтрация ключей списка фильтров
    public function filter_list_filter($filters)
    {
        return $filters->map(function ($filter) {
            $result = [
                'title' => $filter->title,
                'key' => array_filter([$filter->key1, $filter->key2]),
            ];
        
            if ($filter->options->isNotEmpty()) {
                $result['options'] = $filter->options->map(function ($option) {
                    return [
                        'title' => $option->title,
                        'value' => $option->value
                    ];
                });
            }
        
            return $result;
        });
    }
}