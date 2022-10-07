<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

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

    public function products(Request $request) {

        $options = [
            ['title', 'like', '%e%']
        ];

        if($request->get('search') !== null){
            array_push(
                $options,
                [
                    'title',
                    'like',
                    sprintf('%%%s%%', $request->get('search'))
                ]
            );
        }

        $products= Product::where($options)->paginate(20);

        $return_vals = [
            'products' => $products,
            'title' => 'Products',
            'request' => $request,
            'categories' => Categories::all(),
        ];
        return view('admin.products.index', $return_vals);
    }

    public function newProduct() {
        $categories = Categories::all();
        $title = "New product";
        return view('admin.products.new', compact('categories', 'title'));
    }

    public function categories() {
        $categories = Categories::paginate(20);
        $title = "Categories";
        return view('admin.categories.index',compact('categories', 'title'));
    }

    public function newCategory() {
        $title = "New Category";
        return view('admin.categories.new', compact('title'));
    }
}
