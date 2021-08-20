<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\UserApiModel;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    function register(Request $req){
        $user=new UserApiModel();
        $user->name=$req->input('name');
        $user->email=$req->input('email');
        $user->password=Hash::make($req->input('password'));
        $user->save();
        return $user;
    }

    function login(Request $req){
        $user=UserApiModel::where('email',$req->email)->first();
        if(!$user || !Hash::check($req->password, $user->password)){
            return ['error'=>'Email or Password not matched'];
        }
        return $user;
    }
}
