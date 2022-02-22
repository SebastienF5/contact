<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function show(){
        $title="Liste Contact";
      $contactList=Contact::where('user_id',Auth::user()->id)->get();
   
        return view('contact',compact('title','contactList'));
    }

    public function showContact($id){
        $title="afficher contact";
      //  $contact=Contact::findOrFail($id);
      $contact=Contact::where([['id',$id],['user_id',Auth::user()->id]])->get()->first();
      
        if(!empty($contact)){
          return view('singlecontact',compact('title','contact'));
        }
        else{
            abort(404);
        }
    }

    public function delete($id){
        $title="Supprimer Contact";
     
        $delContact=Contact::where([['id',$id],['user_id',Auth::user()->id]])->get()->first();
      
        if(!empty($delContact)){
        $delContact->delete();
          if($delContact->image!='contact/user.png'){
            Storage::delete('public/'.$delContact->image);
          }
        }else{
            abort(404);
        }
        $contactList=Contact::where('user_id',Auth::user()->id)->get();

        return view('contact',compact('title','contactList'))->with('message','Contact supprimé avec succes!');
        
    }
}
