<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AddContactController extends Controller
{
    public function show(){
        $title="ajouter Contact";
        return view('addcontact',compact('title'));
    }

    /**
     * fonction permettant d'ajouter des contacts
     * @param Request 
     * 
     */
    public function add(Request $request){
        $request->validate([
            'name'=>['string','max:255'],
            'number'=>['required','string','max:15'],
            'email'=>['string','email','max:255'],
            'adress'=>['string','max:255'],
            'image'=>['mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'user_id'=>['required','numeric','max:25']
        ]);

       
        if(empty($request->image)){
            $image="contact/user.png";
        }
      
        else{
            $image=Storage::disk('public')->put('contact',$request->image);
        }

        
        Contact::create([
            'name'=>$request->name,
            'number'=>$request->number,
            'email'=>$request->email,
            'adress'=>$request->adress,
            'image'=>$image,
            'user_id'=>$request->user_id
        ]);
        
        return redirect(Route('contact'))->with('message','Contact enregistré avec succes!');
    }

    /**
     * fonction permettant de modifier un contact
     * @param Request $request,$id
     */
    public function updateContact(Request $request,$id){
       
       // dd(Storage::delete('public/contact/2XWOQx71vx3JhPkcYXT3zU3tKfZGwjSP1slJdQzi.jpg'));
        $getContact=Contact::find($id);
   
       
        $request->validate([
            'name'=>['string','max:255'],
            'number'=>['required','string','max:15'],
            'email'=>['string','email','max:255'],
            'adress'=>['string','max:255'],
            'image'=>['mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'user_id'=>['required','numeric','max:25']
        ]);
     
    
        if($getContact->image==1){
            $image="contact/user.png";
        }
      
        else{
            $image=Storage::disk('public')->put('contact',$request->image);
        }

       if(($getContact->image != $request->image) and $getContact->image != 'contact/user.png'){
           Storage::delete('public/'.$getContact->image);
       }

        $getContact->update([
            'name'=>$request->name,
            'number'=>$request->number,
            'email'=>$request->email,
            'adress'=>$request->adress,
            'image'=>$image,
            'user_id'=>$request->user_id
        ]);
      
        return redirect(Route('contact'))->with('message','Contact modifié avec succes!');
    }

    /**
     * fonction permettant d'obtenir un contact
     * @param $id
     */

     public function getContact($id){
        $title="Modifier Contact";
        $getContact=Contact::where([['id',$id],['user_id',Auth::user()->id]])->get()->first();
     if(!empty($getContact))
        return view('updateContact',compact('title','getContact'));
        else
        abort(404);
     }

 

}
