<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
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
     
        $image=Storage::disk('public')->put('contact',$request->image);
        $request->validate([
            'name'=>['string','max:255'],
            'number'=>['required','string','max:15'],
            'email'=>['string','email','max:255'],
            'adress'=>['string','max:255'],
            'image'=>['mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'user_id'=>['required','numeric','max:25']
        ]);

     
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
    public function modifierContact(Request $request,$id){
        $getContact=Contact::findOrFail($id);
        $request->validate([
            'name'=>['string','max:255'],
            'number'=>['required','string','max:15'],
            'email'=>['string','email','max:255'],
            'adress'=>['string','max:255'],
            'image'=>['mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'user_id'=>['required','numeric','max:25']
        ]);
     
        $image=Storage::disk('public')->put('contact-img',$request->image);

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
 
        $getContact=Contact::findOrFail($id);
        $contacts=Contact::all();
        return view('addcontact',compact('title','getContact','contact'));
     }
}
