<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
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

    public function accounts(Request $request) {

        $query = User::query();

        if($request->get('search') !== null){
            $query = $query->where('name', 'like', sprintf('%%%s%%', $request->get('search')))
                        ->orWhere('email', 'like', sprintf('%%%s%%', $request->get('search')));
        }

        if($request->get('role') == "0" || $request->get('role') == null) {
            $query = $query;
        }else {
            $query = $query->whereIn('id', function($subquery) use($request) {
                $subquery->select('user_id')->from('role_user')->where('role_id', '=', $request->get('role'));
            });
        }

        if($request->get('email_verified') == 'on') {
            $query->where('email_verified_at', '<>', null);
        }

        if($request->get('startdate') !== null) {
            $query->where('created_at', '>', $request->get('startdate'));
        }

        if($request->get('enddate') !== null) {
            $query->where('created_at', '<', $request->get('enddate'));
        }

        $accounts = $query->paginate(20);


        $return_vals = [
            'accounts' => $accounts,
            'roles' => Role::all(),
            'title' => "Accounts",
            'request' => $request
        ];

        return view('admin.accounts.index', $return_vals);
    }

    public function accounts_new(Request $request) {

        $user = [];

        if($request->get('id')) {
            $user = User::find($request->get('id'));
        };

        $roles = Role::all();

        $title = "New Account";

        $return_vals = [
            "title" => $title,
            "user" => $user,
            "roles" => $roles,
        ];
        return view('admin.accounts.new', $return_vals);
    }
}
