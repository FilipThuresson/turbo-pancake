<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

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
        return $this->hasOne(ProductImage::class)->where('thumbnail', '=', 1);
    }
}
