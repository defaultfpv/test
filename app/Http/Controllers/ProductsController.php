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


    /**
    * @OA\Post(
    *     path="/product/{section_id}/{pet_id}",
    *     tags={"Товары"},
    *     summary="Добавить новый товар",
    *     @OA\RequestBody(
    *         required=true,
    *         @OA\JsonContent(
    *             required={"title", "description", "structure", "features", "price", "images"},
    *             @OA\Property(property="title", type="string"),
    *             @OA\Property(property="description", type="string"),
    *             @OA\Property(property="structure", type="string"),
    *             @OA\Property(property="features", type="string"),
    *             @OA\Property(property="price", type="string"),
    *             @OA\Property(property="variety", type="array", nullable=true,
    *                @OA\Items(
    *                   required={"variety_id", "description", "price"},
    *                   @OA\Property(property="variety_id", type="integer"),
    *                   @OA\Property(property="description", type="string"),
    *                   @OA\Property(property="price", type="integer"),
    *                )
    *             ),
    *             @OA\Property(property="filters_options_value", type="array",
    *                @OA\Items(
    *                   type="string"
    *                )
    *             ),
    *             @OA\Property(property="images", type="array",
    *                @OA\Items(
    *                   type="string",
    *                   format="binary"
    *                ),
    *                minItems=1
    *             )
    *         )
    *     ),
    *     @OA\Response(
    *         response=201,
    *         description="Успешное добавление товара",
    *         @OA\JsonContent(
    *             @OA\Property(property="message", type="string"),
    *         )
    *     ),
    *     @OA\Response(
    *         response=400,
    *         description="Ошибка валидации",
    *         @OA\JsonContent(
    *             @OA\Property(property="message", type="string"),
    *         )
    *     ),
    *     security={{"bearerAuth": {}}}
    * )
    */
    public function create_product(Request $request, $section_id, $pet_id)
    {
        $user = $request->user();
        if ($user->role != 'admin' and $user->role != 'manager') return response()->json(['message' =>"you don't have the rights to perform this action"], 400);

        $section_pet = SectionsPets::where('pet_id', $pet_id)->where('section_id', $section_id)->first();
        if ($section_pet) $section_pet_id = $section_pet->id;
        else return response()->json(['message' => 'section not found'], 400);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'structure' => 'required|string|max:255',
            'features' => 'required|string|max:255',
            'price' => 'required|integer',
            'variety' => 'array',
            'variety.*.variety_id' => 'required|integer',
            'variety.*.description' => 'required|string',
            'variety.*.price' => 'required|integer',
            'filters_options_value' => 'array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:12048',
        ]);

        $create = $this->productService->create($request, $section_id, $section_pet_id);

        if (!$create) return response()->json(['message' => "Product created successfully!"], 201);
        else return response()->json(['message' => $create], 400);

    }



       /**
    * @OA\Get(
    *     path="/products/{product_id}",
    *     tags={"Товары"},
    *     summary="Получить товар",
    *     @OA\Response(
    *         response=200,
    *         description="Success",
    *         @OA\JsonContent(
    *             @OA\Property(property="product", type="object", ref="#/components/schemas/Product")
    *         )
    *     ),
    * )
    *
    * @OA\Schema(
    *      schema="Product",
    *      @OA\Property(property="id", type="integer"),
    *      @OA\Property(property="title", type="string"),
    *      @OA\Property(property="description", type="string"),
    *      @OA\Property(property="structure", type="string"),
    *      @OA\Property(property="features", type="string"),
    *      @OA\Property(property="price", type="integer"),
    *      @OA\Property(property="images", type="array",
    *          @OA\Items(
    *              type="string"
    *          )
    *      ),
    *      @OA\Property(property="variety", type="array",
    *          @OA\Items(
    *              @OA\Property(property="variety_title", type="array",
    *                  @OA\Items(
    *                      @OA\Property(property="description", type="string"),
    *                      @OA\Property(property="price", type="integer")
    *                  )
    *              )
    *          )
    *      ),
    *      @OA\Property(property="specifications", type="array",
    *          @OA\Items(
    *              @OA\Property(property="title", type="string"),
    *              @OA\Property(property="value", type="string")
    *          )
    *      )
    * )
    *
    */
    public function product($product_id)
    {
        $check = Product::find($product_id);
        if (!$check) return response()->json(['message' => 'product not found'], 404);
        $product = $this->productService->product($product_id);
        return response()->json($product, 200);
    }



    /**
    * @OA\Get(
    *     path="/products/{section_id}/{pet_id}",
    *     tags={"Товары"},
    *     summary="Получить список товаров по разделу и питомцу",
    *     @OA\Parameter(name="sort", in="query", required=false, description="Сортировка продуктов по популярности или цене", @OA\Schema(type="string", example="popularity")),
    *     @OA\Parameter(name="min_price", in="query", required=false, description="Минимальная цена", @OA\Schema(type="integer", example=100)),
    *     @OA\Parameter(name="max_price", in="query", required=false, description="Максимальная цена", @OA\Schema(type="integer", example=1000)),
    *     @OA\Parameter(name="maker", in="query", required=false, description="Марка", @OA\Schema(type="string", example="royal_canin")),
    *     @OA\Parameter(name="age", in="query", required=false, description="Возраст", @OA\Schema(type="string", example="dlya_samih_malenkih")),
    *     @OA\Parameter(name="size", in="query", required=false, description="Размер питомца", @OA\Schema(type="string", example="sredniy")),
    *     @OA\Parameter(name="type_feel", in="query", required=false, description="Тип корма", @OA\Schema(type="string", example="suhoy")),
    *     @OA\Parameter(name="type_additive", in="query", required=false, description="Тип добавки", @OA\Schema(type="string", example="lakomstvo")),
    *     @OA\Parameter(name="purpose", in="query", required=false, description="Назначение товара", @OA\Schema(type="string", example="dekorativniy")),
    *     @OA\Parameter(name="purpose2", in="query", required=false, description="Назначение товара2", @OA\Schema(type="string", example="dlya_ushey")),
    *     @OA\Response(
    *         response=200,
    *         description="Success",
    *         @OA\JsonContent(
    *             @OA\Property(property="сatalogPage", type="object", ref="#/components/schemas/CatalogPage")
    *         )
    *     ),
    * )
    *
    * @OA\Schema(
    *      schema="CatalogPage",
    *      @OA\Property(property="title", type="string"),
    *      @OA\Property(property="count_products", type="integer"),
    *      @OA\Property(property="sort",type="array",
    *          @OA\Items(
    *              @OA\Property(property="title", type="string"),
    *              @OA\Property(property="value", type="string")
    *          )
    *      ),
    *      @OA\Property(property="filters", type="array",
    *          @OA\Items(
    *              @OA\Property(property="title", type="string"),
    *              @OA\Property(property="key", type="array",
    *                  @OA\Items(type="string")
    *              ),
    *              @OA\Property(property="options", type="array",
    *                  @OA\Items(
    *                      @OA\Property(property="title", type="string"),
    *                      @OA\Property(property="value", type="string")
    *                  )
    *              )
    *          )
    *      ),
    *      @OA\Property(property="products", type="array",
    *          @OA\Items(
    *              @OA\Property(property="id", type="integer"),
    *              @OA\Property(property="title", type="string"),
    *              @OA\Property(property="price", type="integer"),
    *              @OA\Property(property="image", type="string")
    *          )
    *      )
    * )
    *
    */
    public function products($section_id, $pet_id)
    {
        $sections_pets = SectionsPets::where('pet_id', $pet_id)
        ->where('section_id', $section_id)
        ->get();

        if (!$sections_pets->isNotEmpty()) return response()->json(['message' => 'no results'], 200);

        $filters = request()->query();
        
        $page_title = $sections_pets->first()->title;
        $products = $this->productService->products($sections_pets, $filters);
        $count = $products->count();
        $sort = $this->productService->sort();
        $filters = $this->productService->filters($section_id);

        return response()->json([
            'title' => $page_title, 
            'count_products' => $count, 
            'sort' => $sort, 
            'filters' => $filters, 
            'products' => $products
        ], 200);
    }

}
