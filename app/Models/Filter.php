<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;

    protected $table = 'filters';
    protected $fillable = ['title', 'key1', 'key2'];

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'sections_filters');
    }

    public function options()
    {
        return $this->belongsToMany(Option::class, 'filters_options');
    }
}