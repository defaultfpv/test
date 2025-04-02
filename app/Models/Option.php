<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $table = 'options';
    protected $fillable = ['title', 'value'];

    public function filters()
    {
        return $this->belongsToMany(Filter::class, 'filters_options');
    }

    public function Product()
    {
        return $this->belongsToMany(Product::class, 'products_options');
    }
}