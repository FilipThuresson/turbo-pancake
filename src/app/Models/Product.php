<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
        'price',
        'trending'
    ];

    public function images() {
        return $this->hasMany(ProductImage::class);
    }
    public function image_thumnail() {
        return $this->hasOne(ProductImage::class)->oldest();
    }
}
