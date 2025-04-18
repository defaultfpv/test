<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Section;
use App\Models\ProductsOptions;
use App\Models\Option;
use App\Models\ProductsVariety;
use App\Models\ImagesProducts;
use App\Models\Filter;
use App\Models\Image;
use App\Models\Variety;

class ProductService
{
    
    // получить один товар
    public static function product($product_id)
    {
        $product =Product::with('images')->find($product_id);
        unset($product['created_at']);
        unset($product['updated_at']);
        unset($product['count_sales']);
        unset($product['section_pet_id']);
        unset($product['quantity']);
        
        $images = $product['images'];
        unset($product['images']);
        foreach ($images as $image) {
            $images_pathes[] = $image['path'];
        }
        $product['images'] = $images_pathes;

        $check = ProductsVariety::where('product_id', $product_id)->first();
        if ($check) {
            $products_variety = ProductsVariety::where('product_id', $product_id)->get();
            $x = 0;
            foreach ($products_variety as $product_variety) {
                $variety = Variety::find($product_variety['variety_id']);
                $varietyes[$x]['id'] = $product_variety['id'];
                $varietyes[$x]['description'] = $product_variety['variety_description'];
                $varietyes[$x]['price'] = $product_variety['price'];
                $x++;
            }
            $product['variety'] = $varietyes;
        }

        $options = $product->options;
        unset($product['options']);
        foreach ($options as $option) {
            $filters[] = [
                'title' => $option->filters[0]['title'],
                'value' => $option['title']
            ];
        }
        if (isset($filters)) $product['specifications'] = $filters;

        return $product;
    }


    // добавление нового товара
    public function create($request, $section_id, $section_pet_id)
    {
        
        $price = $this->price($request);
        
        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'structure' => $request->structure,
            'features' => $request->features,
            'section_pet_id' => $section_pet_id,
            'price' => $price,
        ]);
        
        if (isset($request['variety'])) {
            foreach ($request['variety'] as $variety) {
                ProductsVariety::create([
                    'variety_id' => 1,
                    'product_id' => $product->id,
                    'variety_description' => $variety['description'],
                    'price' => $variety['price'],
                ]);
            }
        }
        
        if (isset($request['filters_options_value'])) {
            foreach ($request['filters_options_value'] as $value) {
                $option = Option::where('value', $value)->first();
                if (!$option) return 'Option not found';
                $productOption = ProductsOptions::create([
                    'product_id' => $product->id,
                    'option_id' => $option->id,
                ]);
            }
        }

        if (isset($request['images'])) {
            foreach ($request['images'] as $image) {
                $path = $image->store('images', 'public'); // Сохраняем в storage/app/public/images
                $imageRecord = Image::create([
                    'path' => $path,
                ]);

                $product->images()->attach($imageRecord->id);
            }
        }
    }


    // получение минимальной цены для товара
    public function price($request)
    {
        if (isset($request['variety'])) return collect($request['variety'])->min('price');
        return $request->price;
    }



    // получение товаров
    public function products($sections_pets, $filters)
    {
        $sections_pets_id = $sections_pets->first()->id;
        $query = Product::with('images')
        ->where('section_pet_id', $sections_pets_id);
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


    // получение списка похожих товаров
    public function related($product_id)
    {
        $product = Product::find($product_id);
        $products = Product::with('images')->where('section_pet_id', $product['section_pet_id'])->get();
        $products = $this->filter_list_products($products);
        return $products;
    }


    // удаление товара
    public function delete($product_id)
    {
        $product = Product::find($product_id);
        if (!$product) return false;
        $product->delete();
        return true;
    }



    // редактирование товара
    public function update($request, $product_id)
    {
        $price = $this->price($request);

        $product = Product::find($product_id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->structure = $request->structure;
        $product->features = $request->features;
        $product->price = $price;
        $product->save();

        
        if (isset($request['variety'])) {
            ProductsVariety::where('product_id', $product_id)->delete();
            foreach ($request['variety'] as $variety) {
                ProductsVariety::create([
                    'variety_id' => $variety['variety_id'],
                    'product_id' => $product->id,
                    'variety_description' => $variety['description'],
                    'price' => $variety['price'],
                ]);
            }
        }
        
        if (isset($request['filters_options_value'])) {
            ProductsOptions::where('product_id', $product_id)->delete();
            foreach ($request['filters_options_value'] as $value) {
                $option = Option::where('value', $value)->first();
                if (!$option) return 'Option not found';
                $productOption = ProductsOptions::create([
                    'product_id' => $product->id,
                    'option_id' => $option->id,
                ]);
            }
        }

        if (isset($request['images'])) {
            ImagesProducts::where('product_id', $product_id)->delete();
            foreach ($request['images'] as $image) {
                $path = $image->store('images', 'public'); // Сохраняем в storage/app/public/images
                $imageRecord = Image::create([
                    'path' => $path,
                ]);
                $product->images()->attach($imageRecord->id);
            }
        }
    }
}