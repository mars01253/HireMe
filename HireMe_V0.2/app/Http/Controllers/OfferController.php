<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Offer_Candidate;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function destroy($id){
        $offer = Offer::where('id' , $id);
        if($offer){
            $offer->delete();
            return to_route('enterprise.home')->with('success' , 'Offer Deleted Successfully');
           }else{
               return to_route('enterprise.home')->with('failed' , 'unable to delete the offer');
           }
    }
    public function checkOffer($id){
        $check = Offer_Candidate::where('offer_id' , $id)->get();
        $alreadyApplied = $check->candidate_id; 
        if($alreadyApplied){
            return true ; 
        }else{
            return false ;
        }
    }
    public function ConsultCandidates($id){
        $candidates = Offer_Candidate::where('offer_id' , $id)->get();
        return view('canidates-offers' , ['candidates'=>$candidates]);
    }
    public function JobOffers(){
        $offers = Offer::get();
        return view('joboffers' , ['offers'=>$offers]);
    }
    public function JobOffer($id){
        $offer = Offer::where( 'id', $id)->get();
        $result =  $this->checkOffer($id);
        if($result){
            return view('joboffer' , ['offer'=>$offer , 'exist'=>true]);
        }else{
            return view('joboffer' , ['offer'=>$offer , 'exist'=>false]);
        }
    }

    public function StoreApplication(Request $request){
        $candidate_id = auth()->user()->id ;
        $offer_id = $request->id ;
        Offer_Candidate::create([
                'candidate_id' => $candidate_id ,
                'offer_id' => $offer_id ]);
        return to_route('job.offers')->with('applied' , 'you have applied succesfully');
    }
}
