<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsVariety extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'products_variety';
    protected $fillable = ['variety_id', 'product_id', 'variety_description', 'price'];
}