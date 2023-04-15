<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'category',
        'shortname',
        'name',
        'description',
        'price',
        'brand',
        'color',  
        'count',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
