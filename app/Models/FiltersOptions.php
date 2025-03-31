<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiltersOptions extends Model
{
    use HasFactory;

    // Укажите имя таблицы
    protected $table = 'filters_options'; // Укажите правильное имя таблицы

    // Укажите, какие поля можно массово заполнять
    protected $fillable = ['filter_id', 'option_id'];
}




