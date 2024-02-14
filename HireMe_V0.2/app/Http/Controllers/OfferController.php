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
        return view('joboffer' , ['offer'=>$offer]);
    }
}
