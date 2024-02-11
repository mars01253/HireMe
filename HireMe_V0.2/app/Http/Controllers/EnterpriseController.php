<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;

class EnterpriseController extends Controller
{
    public function index(){
        return view('profile/profile-enterprise');
    }
    public function update_token(){
        $id = auth()->user()->id;
        User::where('id', $id)->update(['confirm' => 1]);
    }
    public function store(Request $request){
        $formfields = $request->validate([
            'id'=>['required'] , 
            'email'=>['required'] ,
            'name'=>['required'] ,
            'logo'=>['required'],
            'slogan'=>['required' , 'string' , 'max:255'] , 
            'industrie'=>['required' , 'string' , 'max:255'] ,
            'description' =>['required' , 'string']
        ]);
        $enterprise = Enterprise::create($formfields);
        $this->update_token();
        return redirect('/profile/enterprise');
    }
    public function storeOffer(Request $request){
        $formfields = $request->validate([
            'enterprise_id'=>['required'] , 
            'title'=>['required' , 'string' ] ,
            'skills'=>['required' , 'string'] ,
            'description'=>['required', 'string'],
            'Contract'=>['required' , 'string' , 'max:255'] , 
            'Location'=>['required' , 'string' , 'max:255'] 
        ]);
        $Offer = Offer::create($formfields);
        return to_route('profile.enterprise');
    }
}
