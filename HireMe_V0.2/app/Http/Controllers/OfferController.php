<?php

namespace App\Http\Controllers;

use App\Models\Offer;
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
}
