<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    // Укажите имя таблицы
    protected $table = 'catalog'; // Укажите правильное имя таблицы

    // Укажите, какие поля можно массово заполнять
    protected $fillable = ['code', 'title'];
}