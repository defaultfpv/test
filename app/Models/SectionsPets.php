<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionsPets extends Model
{
    use HasFactory;

    protected $table = 'sections_pets'; 
    protected $fillable = ['section_id', 'pet_id', 'title'];
}