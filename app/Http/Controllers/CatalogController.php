<?php

namespace App\Http\Controllers;

use App\Swagger\Swagger;
use App\Models\Section;
use App\Models\Pet;
use Illuminate\Http\Request;
use App\Services\CatalogService;

class CatalogController extends Controller
{

    protected $catalogService;

    public function __construct(CatalogService $catalogService)
    {
        $this->catalogService = $catalogService;
    }


    /**
    * @OA\Get(
    *     path="/sections",
    *     tags={"Каталог"},
    *     summary="Получить все разделы",
    *     @OA\Response(
    *         response=200,
    *         description="Success",
    *         @OA\JsonContent(
    *             @OA\Property(property="section", type="object", ref="#/components/schemas/Section")
    *         )
    *     ),
    * )
    *
    *
    * @OA\Schema(
    *      schema="Section",
    *      @OA\Property(property="id", type="integer"),
    *      @OA\Property(property="title", type="string"),
    *      @OA\Property(property="icon", type="string"),
    *      @OA\Property(property="image", type="string")
    * )
    *
    * @OA\Get(
    *     path="/sections/{pet_id}",
    *     tags={"Каталог"},
    *     summary="Получить разделы по определенному питомцу",
    *     @OA\Response(
    *         response=200,
    *         description="Success",
    *         @OA\JsonContent(
    *             @OA\Property(property="section", type="object", ref="#/components/schemas/Section")
    *         )
    *     ),
    * )
    */
    public function sections($pet_id = null)
    {
        if (is_null($pet_id)) $sections = Section::all();
        else $sections = Section::whereHas('pets', function ($query) use ($pet_id) {
            $query->where('pets.id', $pet_id);
        })->get();
        $filter = $this->catalogService->filter_section($sections);
        return response()->json(['sections' => $filter], 200);
    }




    /**
    * @OA\Get(
    *     path="/pets",
    *     tags={"Каталог"},
    *     summary="Получить всех питомцев",
    *     @OA\Response(
    *         response=200,
    *         description="Success",
    *         @OA\JsonContent(
    *             @OA\Property(property="pet", type="object", ref="#/components/schemas/Pet")
    *         )
    *     ),
    * )
    *
    *
    * @OA\Schema(
    *      schema="Pet",
    *      @OA\Property(property="id", type="integer"),
    *      @OA\Property(property="title", type="string"),
    *      @OA\Property(property="image", type="string")
    * )
    *
    * @OA\Get(
    *     path="/pets/{section_id}",
    *     tags={"Каталог"},
    *     summary="Получить питомцев по определенному разделу",
    *     @OA\Response(
    *         response=200,
    *         description="Success",
    *         @OA\JsonContent(
    *             @OA\Property(property="pet", type="object", ref="#/components/schemas/Pet")
    *         )
    *     ),
    * )
    */
    public function pets($section_id = null)
    {
        if (is_null($section_id)) $pets = Pet::all();
        else $pets = Pet::whereHas('sections', function ($query) use ($section_id) {
            $query->where('sections.id', $section_id);
        })->get();
        $filter = $this->catalogService->filter_pet($pets);
        return response()->json(['pets' => $filter], 200);
    }
    
}
