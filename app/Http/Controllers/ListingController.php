<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index()  {
        return view('listings.index',[
            'listings'=>Listing::latest()->filter(request(["tag","search"]))->paginate(5)
        ]);
        
    } 
    public function show(Listing $listing)  {
        return view('listings.show',[
            'listing'=>$listing
        ]);         
    } 
    public function create()  {
        return view('listings.create');         
    }
    public function store(Request $request){
        $formFields=$request->validate([
            "title"=>"required",
            "tags"=>"required",
            "company"=>["required",Rule::unique('listings','company')],
            "location"=>"required",
            "email"=>["required","email"],
            "website"=>"required",
            "description"=>"required"
        ]);

        Listing::create($formFields);
        
        return redirect('/')->with('message','Listing created succesfully!');        
    }
}
