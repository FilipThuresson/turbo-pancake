<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public function uses() {
        return count(CategoryProduct::where('category_id', '=', $this->id)->get());
    }
}
