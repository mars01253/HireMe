<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function reroute(){
        
        if(Auth::id()) {
            $role = auth()->user()->role;
            if($role=='ADMIN'){
                return view('admin');
            }elseif($role=='Candidate'){
                return to_route('profile.candidate');
            }elseif ($role=='Enterprise') {
                return to_route('profile.enterprise');
            }else {
                return view('welecome');
            }
        }
    }
}
