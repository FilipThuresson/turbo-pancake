<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_ADMIN');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function products() {
        $products= Product::paginate(20);
        return view('admin.products.index', compact('products'));
    }
}
