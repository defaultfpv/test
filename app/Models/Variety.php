<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variety extends Model
{
    use HasFactory;

    // Укажите имя таблицы
    protected $table = 'variety'; // Укажите правильное имя таблицы

    // Укажите, какие поля можно массово заполнять
    protected $fillable = ['title', 'catalog_id'];
}