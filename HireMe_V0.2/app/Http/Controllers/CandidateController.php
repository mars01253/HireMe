<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{

    public function store(Request $request)
    {
        $formfields = $request->validate([
            'id' => ['required'],
            'email' => ['required'],
            'name' => ['required'],
            'photo' => ['required', 'string'],
            'titre' => ['required', 'string', 'max:255'],
            'current_position' => ['required', 'string', 'max:255'],
            'industry' => ['required', 'string'] , 
            'address' => ['required', 'string'] , 
            'about' => ['required', 'string'] , 
        ]);
        $canidiate = Candidate::create($formfields);
        $update = new EnterpriseController() ; 
        $update->update_token();
        return redirect('/candidate');
    }
}
