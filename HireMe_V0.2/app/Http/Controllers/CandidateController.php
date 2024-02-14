<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Cursus;
use App\Models\Cv;
use App\Models\Experience;
use App\Models\Language;
use App\Models\User;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index(){
        $id = auth()->user()->id;
        $data = Candidate::where('user_id' , $id)->first();
        if($data){
            return view('candidate' , ['data'=>$data]);
        }
        return view('candidate');
    }
    public function update_Cv_token(){
        $id = auth()->user()->id;
        User::where('id', $id)->update(['hasCv' => 1]);
    }
    public function store(Request $request)
    {
        $formfields = $request->validate([
            'user_id'=> ['required'],
            'email' => ['required'],
            'name' => ['required'],
            'photo' => ['required'],
            'titre' => ['required', 'string', 'max:255'],
            'current_position' => ['required', 'string', 'max:255'],
            'industry' => ['required', 'string'] , 
            'address' => ['required', 'string'] , 
            'about' => ['required', 'string'] , 
        ]);
        $candidate = Candidate::create($formfields);
        $update = new EnterpriseController() ; 
        $update->update_token();
        return to_route('profile.candidate');
    }
    
    public function storeCv(Request $request)
    {
    $userId = auth()->user()->id;
    $candidate = Candidate::where('user_id' , $userId)->first();

    $cv = Cv::create([
        'name' =>$request->name ,
        'email' => $request->email ,
        'photo' =>$request->photo ,
        'skills' => $request->input('skills'),
        'candidate_id' => $candidate->id]);

    // $languages = $request->input('languages');
    // foreach ($languages as $language) {
    Language::create([
        'name' => $request->input('langname'),
        'proficiency' => $request->input('proficiency'),
        'cv_id' => $cv->id,
    ]);
    // }

    //  Experience
    // $experiences = $request->input('experiences');
    // foreach ($experiences as $experience) {
    Experience::create([
        'poste' => $request->input('poste'),
        'company' => $request->input('company'),
        'start_date_exp' => $request->input('start_date_exp'),
        'end_date_exp' => $request->input('end_date_exp'),
        'cv_id' => $cv->id,
    ]);
    // }

    //  Cursus
    // $cursuses = $request->input('cursuses');
    // foreach ($cursuses as $cursus) {
    Cursus::create([
        'diplome' => $request->input('diplome'),
        'school' => $request->input('school'),
        'start_date_school' => $request->input('start_date_school'),
        'end_date_school' => $request->input('end_date_school'),
        'cv_id' => $cv->id,
    ]);
    // }
       $this->update_Cv_token();
       $this->index();
    }
}
