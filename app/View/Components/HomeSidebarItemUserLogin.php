<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class HomeSidebarItemUserLogin extends Component{

    private $status, $user;

    public function __construct(){
        $this->status = Auth::guard()->check();
        if($this->status) $this->user = Auth::guard()->user();
    }

    public function render(){
        return view('components.home-sidebar-item-user-login', [
            'status'    => $this->status,
            'user'      => $this->user,
        ]);
    }
}
