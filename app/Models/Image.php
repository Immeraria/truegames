<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';    
    protected $fillable = [
        'category',
        'url', 
        'product_id',
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
