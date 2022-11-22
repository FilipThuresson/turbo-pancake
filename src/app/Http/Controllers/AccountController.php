<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_ADMIN');
    }

    public function new(Request $request) {
        if(!is_null($request->id)) {

            if($request->post('password') === $request->post('password_confirm')){
                $user = User::find($request->id);

                $user->name = $request->post('name');
                $user->email = $request->post('email');
                $user->password = Hash::make($request->post('password'));
                $user->save();
            } else {
                Session::flash('error', 'Passwords doesnt match');
            }
        }
    }
}
