<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; 

    public function images()
    {
        return $this->belongsToMany(Image::class, 'images_products');
    }

    public function Options()
    {
        return $this->belongsToMany(Option::class, 'products_options');
    }
    
}