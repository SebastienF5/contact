<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function show(){
        $title="Contact";
       // $contactList=Contact::all();
      $contactList=Contact::where('user_id',Auth::user()->id)->get();
   
        return view('contact',compact('title','contactList'));
    }

    public function showContact($id){
        $title="afficher contact";
        $contact=Contact::findOrFail($id);
      
        return view('singlecontact',compact('title','contact'));
    }


}
