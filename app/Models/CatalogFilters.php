<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogFilters extends Model
{
    use HasFactory;

    // Укажите имя таблицы
    protected $table = 'catalog_filters'; // Укажите правильное имя таблицы

    // Укажите, какие поля можно массово заполнять
    protected $fillable = ['catalog_id', 'filter_id'];
}