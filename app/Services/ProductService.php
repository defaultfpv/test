<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Filter;

class ProductService
{
    // получение товаров
    public function products($sections_pets, $filters) {
        $sections_pets_id = $sections_pets->first()->id;
        $query = Product::with('images')
        ->where('sections_pets_id', $sections_pets_id);

        if (isset($filters['min_price'])) {
            $query->where('price', '>=', $filters['min_price']);
        }

        if (isset($filters['max_price'])) {
            $query->where('price', '<=', $filters['max_price']);
        }

        if (isset($filters['maker'])) {
            $option_value = $filters['maker'];
            $query->whereHas('options', function($q) use ($option_value) {
                $q->where('value', $option_value);
            });
        }

        if (isset($filters['age'])) {
            $option_value = $filters['age'];
            $query->whereHas('options', function($q) use ($option_value) {
                $q->where('value', $option_value);
            });
        }

        if (isset($filters['size'])) {
            $option_value = $filters['size'];
            $query->whereHas('options', function($q) use ($option_value) {
                $q->where('value', $option_value);
            });
        }

        if (isset($filters['type_feel'])) {
            $option_value = $filters['type_feel'];
            $query->whereHas('options', function($q) use ($option_value) {
                $q->where('value', $option_value);
            });
        }

        if (isset($filters['type_additive'])) {
            $option_value = $filters['type_additive'];
            $query->whereHas('options', function($q) use ($option_value) {
                $q->where('value', $option_value);
            });
        }

        if (isset($filters['purpose'])) {
            $option_value = $filters['purpose'];
            $query->whereHas('options', function($q) use ($option_value) {
                $q->where('value', $option_value);
            });
        }

        if (isset($filters['purpose2'])) {
            $option_value = $filters['purpose2'];
            $query->whereHas('options', function($q) use ($option_value) {
                $q->where('value', $option_value);
            });
        }

        $products = $query->get();

        if (isset($filters['sort'])) {
            switch ($filters['sort']) {
                case 'price_asc':
                    $products = $products->sortBy('price');
                    break;
                case 'price_desc':
                    $products = $products->sortByDesc('price');
                    break;
                case 'popularity':
                    $products = $products->sortByDesc('count_sales');
                    break;
                default:
                    // Если сортировка не распознана, можно оставить массив без изменений
                    break;
            }

            // Преобразуем коллекцию обратно в массив, если это необходимо
            // $products = $products->values()->all();
        }

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
                'value' => 'count_sales'
            ],
            [
                'title' => 'По возрастанию цены',
                'value' => 'price_asc'
            ],
            [
                'title' => 'По убыванию цены',
                'value' => 'price_desc'
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