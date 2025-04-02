<?php

namespace App\Services;

use App\Models\Section;

class CatalogService
{
    public function filter_section($data)
    {
        return $data->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'icon' => $item->icon,
                'image' => $item->image,
            ];
        });
    }

    public function filter_pet($data)
    {
        return $data->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'image' => $item->image,
            ];
        });
    }
}