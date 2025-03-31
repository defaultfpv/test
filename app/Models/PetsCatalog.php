<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetsCatalog extends Model
{
    use HasFactory;

    // Укажите имя таблицы
    protected $table = 'pets_catalog'; // Укажите правильное имя таблицы

    // Укажите, какие поля можно массово заполнять
    protected $fillable = ['catalog_id', 'pet_id'];
}