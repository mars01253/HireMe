<?php

namespace App\Http\Controllers;

use App\Models\Candidate as ModelsCandidate;
use App\Models\Cursus;
use App\Models\Cv;
use App\Models\Experience;
use App\Models\Language;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CvController extends Controller
{
    public function index(){
        $id = auth()->user()->id ;
       
        $cv = Cv::where( 'candidate_id' ,$id)->firstOrFail() ; 
        $candidate = ModelsCandidate::where( 'user_id' ,$id)->firstOrFail() ; 
        $experience = Experience::where( 'cv_id' ,$cv->id)->firstOrFail();
        $cursus = Cursus::where( 'cv_id',$cv->id)->firstOrFail();
        $language = Language::where('cv_id' , $cv->id )->firstOrFail();
        return view('cv' , ['cv'=>$cv , 'experience'=>$experience , 'cursus'=>$cursus , 'language'=>$language , 'candidate'=>$candidate]);
    }
    public function downloadCv(){
        $pdf = Pdf::loadView('cv');
        return $pdf->download('cv.pdf');    
    }
}
