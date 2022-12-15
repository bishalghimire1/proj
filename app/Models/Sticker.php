<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sticker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'uploade_by',
        'product_image',
        'category',
        'tags',
    ];
}
