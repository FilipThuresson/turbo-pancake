<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CatergoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_ADMIN');
    }

    public function new(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            Session::flash('error', 'Error when validating form, make sure send the right data!');
            return back();
        }

        return "test";

        $category = new Categories();
        $category->name = $request->name;
        $category->desc = $request->desc;
        $saved = $category->save();

        if($saved){
            return 1;
        }

        return [
            'code' => 400,
            'msg' => "Error when saving category!"
        ];
    }

}
