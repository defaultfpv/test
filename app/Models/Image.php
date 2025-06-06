<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';
    protected $fillable = ['path'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'images_products');
    }
}
