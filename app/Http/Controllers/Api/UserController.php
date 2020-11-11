<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdminCollection;
use App\Pimpinan;
use App\Response\Res;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{
    public function index(){
        return new AdminCollection(User::where('api_token', request('token'))->first());
    }
    public function pimpinan(){
        return new AdminCollection(Pimpinan::where('api_token', request('token'))->first());
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return Res::delete(true);
    }
}
