<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    use HasFactory;

    // Укажите имя таблицы
    protected $table = 'options'; // Укажите правильное имя таблицы

    // Укажите, какие поля можно массово заполнять
    protected $fillable = ['title'];
}