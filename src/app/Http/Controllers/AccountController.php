<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
                if($user->save()){
                    $existing_roles = DB::table('role_user')->where('user_id', $user->id)->get();
                    foreach($existing_roles as $role) {
                        if(!in_array($role->role_id, $request->role)) {
                            DB::table('role_user')->delete($role->id);
                        }
                    }
                    if(count($request->role) > 0) {
                        foreach($request->role as $role) {
                            $role = Role::find($role);
                            if(!$user->hasRole($role->name)) {
                                DB::table('role_user')->insert([
                                    'role_id' => $role->id,
                                    'user_id' => $user->id,
                                    'created_at' => date('Y-m-d h:i:s'),
                                    'updated_at' => date('Y-m-d h:i:s'),
                                ]);
                                Session::flash('message', 'Saved user');
                                return redirect('/admin/accounts/');
                            }
                        }
                    }
                    Session::flash('success', 'Account Saved');
                    return redirect('/admin/accounts/');
                }else {
                    Session::flash('error', 'Error when saving user info!');
                    return back();
                };
            } else {
                Session::flash('error', 'Passwords doesnt match');
                return back();
            }
        }
    }
}
