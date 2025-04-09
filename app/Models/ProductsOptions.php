<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductsOptions extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'products_options';
    protected $fillable = ['product_id', 'option_id'];
}
