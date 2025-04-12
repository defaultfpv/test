<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageProduct extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'messages_products';
    protected $fillable = ['product_id', 'message_id'];
}