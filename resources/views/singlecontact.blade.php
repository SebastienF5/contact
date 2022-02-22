@extends('layouts.app')
@section('content')

<section id="addContact">
  
  <div class="container-fluid">
        <div class="row">
           @include('partials.contactMenu')
           <div class="col-12 col-md-12 col-lg-10 body-contact text-center ">
             <div class="col-12 col-md-6 col-lg-6 shadow-sm single mx-auto">
             <p class="single-img"><img src="{{Storage::url($contact->image)}}" class="col-4 col-md-4 col-lg-4" alt="profil image"></p>
             <span class="single-name">{{$contact->name}}</span><br>
             <span class="additional-info">Numero  : {{$contact->number}}</span><br>
             <span class="additional-info">Email   : {{$contact->email}}</span><br>
             <span class="additional-info">Adresse : {{$contact->adress}}</span><br>
              <div class="">
                <a href="{{route('updateContact',['id'=>$contact->id])}}" class=""><i class="fas fa-edit"></i></a>
                <a href="{{route('deleteContact',['id'=>$contact->id])}}" class=""><i class="fas fa-trash-alt"></i></a>
              </div>
             </div>
        </div>
        </div>
        </div>
</section>
@endsection