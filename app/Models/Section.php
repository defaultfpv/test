<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table = 'sections';
    protected $fillable = ['code', 'title'];

    public function pets()
    {
        return $this->belongsToMany(Pet::class, 'sections_pets');
    }

    public function filters()
    {
        return $this->belongsToMany(Filter::class, 'sections_filters');
    }
    
}