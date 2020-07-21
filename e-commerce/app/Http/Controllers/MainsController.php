<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MainsController extends Controller
{
    function index(){
        return view('/');
    }

    function checklogin(Request $request){
        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('pass')
        );

        $users = DB::table('staff')->get();
        foreach($users as $user){
            if($user->email == $user_data["email"] && $user->password == $user_data["password"]){
                return redirect('/staff/'.$user->id.'/index');
            }
        }

        $users = DB::table('users')->get();
        foreach($users as $user){
            if($user->email == $user_data["email"] && $user->password == $user_data["password"]){
                return redirect('/users/'.$user->id.'/index');
            }
        }

        return redirect('/');
    }

    function logout(){
        return redirect('/');
    }
}
