<?php

namespace App\Http\Controllers;

use App\Swagger\Swagger;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\Filter;
use App\Models\SectionsPets;
use App\Services\ProductService;

class ProductsController extends Controller
{

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    



    public function products($section_id, $pet_id)
    {
        $sections_pets = SectionsPets::where('pet_id', $pet_id)
        ->where('section_id', $section_id)
        ->get();
        if (!$sections_pets->isNotEmpty()) return response()->json(['message' => 'no results'], 200);
        $page_title = $sections_pets->first()->title;

        $products = $this->productService->products($sections_pets);
        $count = $products->count();

        $sort = $this->productService->sort();

        $filters = $this->productService->filters($section_id);

        return response()->json(['title' => $page_title, 'count_products' => $count, 'sort' => $sort, 'filters' => $filters, 'products' => $products], 200);
    }
}
