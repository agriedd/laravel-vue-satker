<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginPimpinanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOMEPIMPINAN;

    public function __construct(){
        $this->middleware(['guest', 'guest.pimpinan'])->except('logout');
    }
    
    protected function authenticated(Request $request, $user){
        $user->api_token = Hash::make(now()->getTimestamp().$user->id);
        $user->save();
    }

    public function username(){
        return 'nip';
    }
    
    protected function guard(){
        return Auth::guard('pimpinan');
    }
}
