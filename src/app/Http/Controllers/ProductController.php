<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Request;

//use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function toggleTrending() {
        return Product::where('id', '=', Request::post('id'))->update([
            'trending' => 0,
        ]);
    }
}
