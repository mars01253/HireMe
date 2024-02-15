<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Enterprise;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $users = User::where('role' , '<>' , 'ADMIN')->get();
        $offers = Offer::get();
        return view('admin' , ['users'=>$users , 'offers'=>$offers]);
    }
}
