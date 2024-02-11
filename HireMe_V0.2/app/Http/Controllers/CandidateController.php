<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\User;
use Illuminate\Http\Request;

class CandidateController extends Controller
{

    public function index(){
        $id = auth()->user()->id;
        $data = Candidate::findOrFail($id);
        return view('candidate' , ['data'=>$data]);
    }
    public function store(Request $request)
    {
        $formfields = $request->validate([
            'id' => ['required'],
            'email' => ['required'],
            'name' => ['required'],
            'photo' => ['required'],
            'titre' => ['required', 'string', 'max:255'],
            'current_position' => ['required', 'string', 'max:255'],
            'industry' => ['required', 'string'] , 
            'address' => ['required', 'string'] , 
            'about' => ['required', 'string'] , 
        ]);
        // $candidate = Candidate::create($formfields);
        // $update = new EnterpriseController() ; 
        // $update->update_token();
        
        
        return to_route('profile.candidate');
    }
}
