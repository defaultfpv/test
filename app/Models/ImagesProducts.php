<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImagesProducts extends Model
{
    use HasFactory;

    protected $table = 'images_products';
    protected $fillable = ['product_id', 'image_id'];
}